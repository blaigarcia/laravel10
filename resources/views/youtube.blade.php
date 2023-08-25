<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YouTube Video</title>

    
</head>
<body>
<h1>YouTube Video</h1>
    <div id="player"></div>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
    (function() {
    // Wait until the YouTube API library has been loaded.
    YT.ready(function() {
        // Create a YT.Player object.
        var player = new YT.Player('player', {
            videoId: '{{ $player_url }}',
            controls: 0,
            showinfo: 0,
            rel: 0,
            iv_load_policy: 3
        });
    });
})();
    </script>
</body>
</html>
