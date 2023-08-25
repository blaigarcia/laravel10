<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Youtube;

class YoutubeController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');

        $client = new Client();
        $response = $client->get('https://www.googleapis.com/youtube/v3/videos?id=' . $id . '&part=snippet,contentDetails,player');

        $video = json_decode($response->getBody(), true);

        $player_url = $video['player']['embedHtml'];

        return view('youtube', compact('player_url'));
    }

    public function player($id)
    {
       //  https://youtu.be/VM4HS3ebE7g
        $id = 'VM4HS3ebE7g';
        $response = $this->download( $id);
        dd($video);
 //       $client = new Client();
 //       $response = $client->get('https://www.googleapis.com/youtube/v3/videos?id=' . $id . '&part=snippet,contentDetails,player&key=AIzaSyD8nfiMXGpSOwujCTJ_wejYxYv2fOrNFQ4');

        $video = json_decode($response->getBody(), true);

        // dd($video);

       $player_url = $video['items'][0]['player']['embedHtml'];

      //   $player_url = '<iframe width="480" height="270" src="//www.youtube.com/embed/VM4HS3ebE7g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';

        return view('youtube', compact('player_url'));
    }

    private function download( $videoId )
    {
        $videoId = 'VM4HS3ebE7g';




        $youtube = new Youtube();
        $video = Youtube::getVideoInfo($videoId);

        dd($video);
        $downloadUrl = $video->getDownloadUrl();

        return response()->json([
            'downloadUrl' => $downloadUrl,
        ]);
    }

    private function getYoutubeVideoMeta($videoId, $key)
{
    $ch = curl_init();
    $curlUrl = 'https://www.youtube.com/youtubei/v1/player?key=' . $key;
    curl_setopt($ch, CURLOPT_URL, $curlUrl);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    $curlOptions = '{"context": {"client": {"hl": "en","clientName": "WEB",
        "clientVersion": "2.20210721.00.00","clientFormFactor": "UNKNOWN_FORM_FACTOR","clientScreen": "WATCH",
        "mainAppWebInfo": {"graftUrl": "/watch?v=' . $videoId . '",}},"user": {"lockedSafetyMode": false},
        "request": {"useSsl": true,"internalExperimentFlags": [],"consistencyTokenJars": []}},
        "videoId": "' . $videoId . '",  "playbackContext": {"contentPlaybackContext":
        {"vis": 0,"splay": false,"autoCaptionsDefaultOn": false,
        "autonavState": "STATE_NONE","html5Preference": "HTML5_PREF_WANTS","lactMilliseconds": "-1"}},
        "racyCheckOk": false,  "contentCheckOk": false}';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlOptions);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $curlResult = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    return $curlResult;
}

    private function getvideo()
    {
        $apiKey = "AIzaSyD8nfiMXGpSOwujCTJ_wejYxYv2fOrNFQ4";
        $videoUrl = "YOUTUBE_VIDEO_URL";
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoUrl, $match);
        $youtubeVideoId = $match[1];
        $videoMeta = json_decode(getYoutubeVideoMeta($youtubeVideoId, $apiKey));
        $videoTitle = $videoMeta->videoDetails->title;
        $videoFormats = $videoMeta->streamingData->formats;
        foreach ($videoFormats as $videoFormat) {
            $url = $videoFormat->url;
            if ($videoFormat->mimeType)
                $mimeType = explode(";", explode("/", $videoFormat->mimeType)[1])[0];
            else
                $mimeType = "mp4";
            
        // '<a href="video-downloader.php?link=<?php echo urlencode($url)?>&title=<?php echo urlencode($videoTitle)?>&type=<?php echo $mimeType; ?>">Download Video</a';
        }
    }
   





}
