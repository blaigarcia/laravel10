<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Intervention\Image\Facades\Image;

class videoplayer1 extends Controller
{

    public function index(Request $request)
    {
        return true;
    }
    
    public function GetVideo($video_url)
    {
                // Load the file contents into a variable.
    
        $this->purge();

        $videoUrl = 'https://www.w3schools.com/tags/movie.mp4';

        $videoUrl = 'https://drive.google.com/file/d/12i98EKsFwiBPUIcIcO9cEp49O2m878P5/view?usp=sharing';

             
        $fileName = 'videos/'. basename($videoUrl);
        $contents = file_get_contents( $videoUrl);


        Storage::disk('local')->put( $fileName, $contents);

        $video = Storage::get( $fileName); 
        $path = storage_path('app/'. $fileName);

        $response = Response($video)
            ->header('Content-Type', 'video/mp4')
            ->header('Content-Length', filesize( $path));
        
        return $response;


    }

    // Delete files modified last 1 days
    private function purge ()
    {
        $list = collect(Storage::disk('local')->files('videos', true))
        ->each(function($file) {
              $fileModifiedAt = Storage::lastModified($file);
               if ( $fileModifiedAt < now()->subDays(1)->getTimestamp()) {                                            
                    Storage::disk('local')->delete($file);
                }
	});

    }

   
}
