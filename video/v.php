<?php
?>
<head>
  <link href="https://vjs.zencdn.net/7.5.4/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
</head>

<body>
  <video id='my-videoo' class='video-js' controls preload='auto' width='640' height='264'
  poster='https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg' data-setup='{}'>
    <source src='https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4' type='video/mp4'>
    <source src='https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4' type='video/webm'>
    <p class='vjs-no-js'>
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
    </p>
  </video>

  <script src='https://vjs.zencdn.net/7.5.4/video.js'></script>
</body>