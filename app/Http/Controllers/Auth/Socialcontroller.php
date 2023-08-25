<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

use Laravel\Socialite\Two\InvalidStateException;

class SocialController extends Controller
{
    private $redirectSuccessLogin = 'dashboard';

    /**
     * Gets the social redirect.
     *
     * @param string $provider The provider
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getSocialRedirect($provider, Request $request)
    {
        $providerKey = Config::get('services.'.$provider);

        if (empty($providerKey)) {
            $msgTxt = 'Proveedor no encontrado '. $provider;
            session()->flash('flash.banner', $msgTxt);
            session()->flash('flash.bannerStyle', 'danger');

            return back();
        }

           return Socialite::driver($provider)->redirect();

    }



    /**
     * Gets the social handle.
     *
     * @param string $provider The provider
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getSocialHandle($provider, Request $request)
    {
        $denied = $request->denied ? $request->denied : null;
        if ($denied != null || $denied != '') {
            return redirect()->to('login')
                ->with('status', 'danger')
                ->with('message', trans('socials.denied'));
        }


        $socialUserObject = Socialite::driver($provider)->user();

        // Check if email is already registered
        $userCheck = User::where('email', '=', $socialUserObject->email)->first();


        if($userCheck){
            auth()->login($userCheck, true);
            return redirect($this->redirectSuccessLogin);
        } else {
            return redirect()->to('socialite')
                ->with('status', 'AVISO')
                ->with('message', 'Mail no registrado');
        }

    }


}
