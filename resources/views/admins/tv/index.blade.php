<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TV</title>
    <link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">

</head>
<body>
    <video id='hls-example'  class="video-js vjs-default-skin" width="400" height="300" controls>
        <source type="application/x-mpegURL"
        src="http://203.176.130.123:8989/live/pnn_480k.stream/playlist.m3u8"
        >
        </video>
</body>
<script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.js"></script>
<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>

<script>
var player = videojs('hls-example');
player.play();
</script>
</html>
