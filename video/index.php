<html>
    <head>

        <link href="https://vjs.zencdn.net/7.5.4/video-js.css" rel="stylesheet">

        <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
        <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .slidecontainer {
                width: 30%;
                margin: 0 auto;

            }

            .slider {
                -webkit-appearance: none;
                width: 100%;
                height: 10px;
                border-radius: 5px;
                background: #d3d3d3;
                outline: none;
                opacity: 0.7;
                -webkit-transition: .2s;
                transition: opacity .2s;
            }

            .slider:hover {
                opacity: 1;
            }

            .slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: #ff7d0a;
                cursor: pointer;
            }

            .slider::-moz-range-thumb {
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: #ff7d0a;
                cursor: pointer;
            }


            html, body {
                margin: 0 auto; 
                height: 100%; 
                width: 100%;
                background: lightslategray;
            }

            .grid-container {
                display: grid;
                /*background-color: activeborder ;*/
                width: 100%;
                height: 100%;

            }

            div.grid-item {
                /*background-color: rgba(255, 255, 255, 0.8);*/
                width: 100%;
                height: 100%;
                border: 1px solid #fff;
                background-color: white;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            }

            /*div.grid-item video{*/
                /*                position: absolute; 
                                right: 0; 
                                bottom: 0;
                                min-width: 100%; 
                                min-height: 100%;
                                width: auto; 
                                height: auto; 
                                z-index: -100;
                                background-size: cover;
                                overflow: hidden;*/

/*                object-fit: cover;
                transition: all .2s ease-in-out;
                margin: 0 auto;
                max-width: 100%;
                max-height: 100%;
                width:100%;
                height: 100%;
            }*/
            
            .video-js{
                object-fit: cover;
                transition: all .2s;
                margin: 0 auto;
                max-width: 100%;
                max-height: 100%;
                width:100%;
                height: 100%;
                
                
                
            }
            .grid-item{
                                transition: all .2s;
-webkit-transform-style: preserve-3d;
-webkit-backface-visibility: hidden;
overflow: auto;
            }
            
            .grid-item:hover{
               
                -ms-transform: scale(2); /* IE 9 */
                -webkit-transform: scale(2); /* Safari 3-8 */
                transform: scale(2); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .grid-item-video-1:hover {
                -ms-transform: scale(2); /* IE 9 */
                -webkit-transform: scale(2); /* Safari 3-8 */
                transform: scale(2); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .grid-item-video-2:hover {
                -ms-transform: scale(4); /* IE 9 */
                -webkit-transform: scale(4); /* Safari 3-8 */
                transform: scale(4); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .grid-item-video-3:hover {
                -ms-transform: scale(6); /* IE 9 */
                -webkit-transform: scale(6); /* Safari 3-8 */
                transform: scale(6); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .grid-item-video-4:hover {
                -ms-transform: scale(8); /* IE 9 */
                -webkit-transform: scale(8); /* Safari 3-8 */
                transform: scale(8); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

        </style>
    </head>
    <body>

        <?php
        $url = "https://api.pexels.com/v1/search?query=tiger&per_page=9&page=1";

        $header = array('Content-Type' => 'application/json');
        $header = addBasicAuth($header);
        $response = request("GET", $url, $header);

        $responceArray = json_decode($response, true);
        $photos = $responceArray['photos'];
        $p = array();
        foreach ($photos as $photo) {
            array_push($p, $photo['src']['original']);
        }

        function addBasicAuth($header) {
            $accesstoken = "563492ad6f917000010000018df40765920741cabbc60ff911c75a16";

            $header['Authorization'] = $accesstoken;
            return $header;
        }

// method should be "GET", "PUT", etc..
        function request($method, $url, $header) {
            $opts = array(
                'http' => array(
                    'method' => $method,
                ),
            );

            // serialize the header if needed
            if (!empty($header)) {
                $header_str = '';
                foreach ($header as $key => $value) {
                    $header_str .= "$key: $value\r\n";
                }
                $header_str .= "\r\n";
                $opts['http']['header'] = $header_str;
            }



            $context = stream_context_create($opts);
            $data = file_get_contents($url, false, $context);
            return $data;
        }
        ?>
        <div class="slidecontainer">
            <input type="range" min="1" max="3" value="1" class="slider" id="myRange">
        </div>
        <div class="grid-container" id="container">

        </div>


        <script>











            var mediaJSON = { "categories" : [ { "name" : "Movies",
        "videos" : [ 
		    { "description" : "Big Buck Bunny tells the story of a giant rabbit with a heart bigger than himself. When one sunny day three rodents rudely harass him, something snaps... and the rabbit ain't no bunny anymore! In the typical cartoon tradition he prepares the nasty rodents a comical revenge.\n\nLicensed under the Creative Commons Attribution license\nhttp://www.bigbuckbunny.org",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" ],
              "subtitle" : "By Blender Foundation",
              "thumb" : "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/BigBuckBunny.jpg",
              "title" : "Big Buck Bunny"
            },
            { "description" : "The first Blender Open Movie from 2006",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4" ],
              "subtitle" : "By Blender Foundation",
              "thumb" : "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ElephantsDream.jpg",
              "title" : "Elephant Dream"
            },
            { "description" : "HBO GO now works with Chromecast -- the easiest way to enjoy online video on your TV. For when you want to settle into your Iron Throne to watch the latest episodes. For $35.\nLearn how to use Chromecast with HBO GO and more at google.com/chromecast.",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4" ],
              "subtitle" : "By Google",
              "thumb" : "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerBlazes.jpg",
              "title" : "For Bigger Blazes"
            },
            { "description" : "Introducing Chromecast. The easiest way to enjoy online video and music on your TV—for when Batman's escapes aren't quite big enough. For $35. Learn how to use Chromecast with Google Play Movies and more at google.com/chromecast.",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4" ],
              "subtitle" : "By Google",
              "thumb" : "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerEscapes.jpg",
              "title" : "For Bigger Escape"
            },
            { "description" : "Introducing Chromecast. The easiest way to enjoy online video and music on your TV. For $35.  Find out more at google.com/chromecast.",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4" ],
              "subtitle" : "By Google",
              "thumb" : "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerFun.jpg",
              "title" : "For Bigger Fun"
            },
            { "description" : "Introducing Chromecast. The easiest way to enjoy online video and music on your TV—for the times that call for bigger joyrides. For $35. Learn how to use Chromecast with YouTube and more at google.com/chromecast.",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4" ],
              "subtitle" : "By Google",
              "thumb" : "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerJoyrides.jpg",
              "title" : "For Bigger Joyrides"
            },
            { "description" :"Introducing Chromecast. The easiest way to enjoy online video and music on your TV—for when you want to make Buster's big meltdowns even bigger. For $35. Learn how to use Chromecast with Netflix and more at google.com/chromecast.", 
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerMeltdowns.mp4" ],
              "subtitle" : "By Google",
              "thumb" : "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerMeltdowns.jpg",
              "title" : "For Bigger Meltdowns"
            },
			{ "description" : "Sintel is an independently produced short film, initiated by the Blender Foundation as a means to further improve and validate the free/open source 3D creation suite Blender. With initial funding provided by 1000s of donations via the internet community, it has again proven to be a viable development model for both open 3D technology as for independent animation film.\nThis 15 minute film has been realized in the studio of the Amsterdam Blender Institute, by an international team of artists and developers. In addition to that, several crucial technical and creative targets have been realized online, by developers and artists and teams all over the world.\nwww.sintel.org",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/Sintel.mp4" ],
              "subtitle" : "By Blender Foundation",
              "thumb" : "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/Sintel.jpg",
              "title" : "Sintel"
            },
			{ "description" : "Smoking Tire takes the all-new Subaru Outback to the highest point we can find in hopes our customer-appreciation Balloon Launch will get some free T-shirts into the hands of our viewers.",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/SubaruOutbackOnStreetAndDirt.mp4" ],
              "subtitle" : "By Garage419",
              "thumb" : "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/SubaruOutbackOnStreetAndDirt.jpg",
              "title" : "Subaru Outback On Street And Dirt"
            },
			{ "description" : "Tears of Steel was realized with crowd-funding by users of the open source 3D creation tool Blender. Target was to improve and test a complete open and free pipeline for visual effects in film - and to make a compelling sci-fi film in Amsterdam, the Netherlands.  The film itself, and all raw material used for making it, have been released under the Creatieve Commons 3.0 Attribution license. Visit the tearsofsteel.org website to find out more about this, or to purchase the 4-DVD box with a lot of extras.  (CC) Blender Foundation - http://www.tearsofsteel.org", 
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/TearsOfSteel.mp4" ],
              "subtitle" : "By Blender Foundation",
              "thumb" : "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/TearsOfSteel.jpg",
              "title" : "Tears of Steel"
            },
			{ "description" : "The Smoking Tire heads out to Adams Motorsports Park in Riverside, CA to test the most requested car of 2010, the Volkswagen GTI. Will it beat the Mazdaspeed3's standard-setting lap time? Watch and see...",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/VolkswagenGTIReview.mp4" ],
              "subtitle" : "By Garage419",
              "thumb" : "https://source.unsplash.com/random/300x200",
              "title" : "Volkswagen GTI Review"
            },
			{ "description" : "The Smoking Tire is going on the 2010 Bullrun Live Rally in a 2011 Shelby GT500, and posting a video from the road every single day! The only place to watch them is by subscribing to The Smoking Tire or watching at BlackMagicShine.com",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/WeAreGoingOnBullrun.mp4" ],
              "subtitle" : "By Garage419",
              "thumb" : "https://source.unsplash.com/random/300x200",
              "title" : "We Are Going On Bullrun"
            },
			{ "description" : "The Smoking Tire meets up with Chris and Jorge from CarsForAGrand.com to see just how far $1,000 can go when looking for a car.The Smoking Tire meets up with Chris and Jorge from CarsForAGrand.com to see just how far $1,000 can go when looking for a car.",
              "sources" : [ "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/WhatCarCanYouGetForAGrand.mp4" ],
              "subtitle" : "By Garage419",
              "thumb" : "https://source.unsplash.com/random/300x200",
              "title" : "What care can you get for a grand?"
            }
    ]}]};
    
    var videos = mediaJSON.categories[0]["videos"];
    
            var no_level = getCookie("no_level");
            var pic_id = 0;
            var slider = document.getElementById("myRange");
            slider.value = no_level;
            slider.oninput = function () {
                no_level = this.value;
                setCookie("no_level", no_level, 2);
                location.reload();
            }

            function devide(divparent, level, parent) {


                if (level >= no_level) {
                    return;
                }
                level++;
                for (var i = 1; i <= 9; i++) {

                    if (i == 5) {
                        var id = parent + " " + level.toString() + ' ' + i.toString();
                        makeGrid(divparent, id)


                    } else {
                        var id = parent + " " + level.toString() + ' ' + i.toString();
                        devideintothree(divparent, id)
                        devide(document.getElementById(id), level, id);
                    }
                }
            }

            function shuffle(id) {
                var center = document.getElementById("0 1 1 5").getElementsByTagName("video")[0];
                var side = document.getElementById(id).getElementsByTagName("video")[0];
                var tempsrc = center.src;
                var tempposter = center.poster;
                center.src = side.src;
                center.poster = side.poster;
                side.src = tempsrc;
                side.poster = tempposter;
                
                center.play();
            }


            function makeGrid(divparent, id) {

                var para = document.createElement("div");
                para.setAttribute("class", "grid-item");
                para.setAttribute("id", id);
//                var thumb = document.createElement("div");
//                thumb.setAttribute("class", "thumb");
//                thumb.setAttribute("onclick", "clicksound.playclip()");
//                thumb.setAttribute("onMouseover", "mouseoversound.playclip()");



                var video = document.createElement("video");
                video.setAttribute("class", "video-js");
                video.setAttribute("id", getLevelById(id));
//            video.setAttribute("controls", "controls");
                video.setAttribute("muted", "muted");
                
                if(id == "0 1 1 5"){
                                    video.setAttribute("controls", "controls");

                }

                video.setAttribute("preload", "auto");
                video.setAttribute("onmouseover", "this.play()");//"playPause('" + id + "')");
                video.setAttribute("onmouseout", "this.pause()");//"playPause('" + id + "')");
                video.setAttribute("onclick", "shuffle('"+id+"')");//"playPause('" + id + "')");

                video.setAttribute("poster", videos[pic_id]["thumb"]);
                video.setAttribute("src", videos[pic_id]["sources"][0]);
                video.setAttribute("type", "video/mp4");
//                thumb.appendChild(video);

                para.appendChild(video);
                divparent.appendChild(para);
                pic_id++;
            }


            function getLevelById(id) {
                var length = id.length;
                return (length - 3) / 4;
            }

            function devideintothree(divparent, id) {

                divparent.style.gridTemplateColumns = "1fr 1fr 1fr";
                divparent.style.gridTemplateRows = "1fr 1fr 1fr";
                var para = document.createElement("div");
                para.setAttribute("class", "grid-container");
                para.setAttribute("id", id);
                divparent.appendChild(para);
            }

            function getNoOfImages(num) {
                var result = 0;
                for (var i = 0; i < num; i++) {
                    result += Math.pow(8, i);
                }

                return result;
            }



//            var request = new XMLHttpRequest();
//            var noOfImages = getNoOfImages(no_level);
//            var path = "https://api.pexels.com/v1/search?query=animals&per_page=" + noOfImages + "&page=1";
//            request.onreadystatechange = state_change;
//            request.open("GET", path, true);
//            request.setRequestHeader("Authorization", "563492ad6f917000010000018df40765920741cabbc60ff911c75a16");
//            request.send(null);
//            function state_change()
//            {
//                if (request.readyState == 4)
//                {// 4 = "loaded"
//                    if (request.status == 200)
//                    {// 200 = OK
//                        var data = request.responseText;
//                        var jsonResponse = JSON.parse(data)['photos'];
//                        console.log(jsonResponse);
//                        for (var i = 0; i < jsonResponse.length; i++) {
//                            var obj = jsonResponse[i]['src']['medium'];
//                            photos.push(obj);
//                        }
//
//                        devide(document.getElementById("container"), 0, "0 1");
//                    } else
//                    {
//                        alert("Problem retrieving XML data");
//                    }
//                }
//            }
            
                        
            devide(document.getElementById("container"), 0, "0 1");
            


            function imageClick(id) {
                shuffle(id);
            }


            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }
            function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }


        </script>

        <script>


//            function playPause(divid)
//            {
//                var grid = document.getElementById(divid);
//                var myVideo = grid.getElementsByClassName("video-js")[0];
//                    
//                grid.style.transition = "all 0.2s";
//
//
//
//
//                if (myVideo.paused) {
////                    grid.style.transform = "scale(2.0)";
//                    var promise = myVideo.play();
//                    myVideo.setAttribute("controls","controls");
//
//                    if (promise !== undefined) {
//                        promise.then(_ => {
//                            // Autoplay started!
//                        }).catch(error => {
//                            // Autoplay was prevented.
//                            // Show a "Play" button so that user can start playback.
//                        });
//                    }
//                } else {
////                    grid.style.transform = "scale(1.0)";
//                    myVideo.removeAttribute("controls");
//
//                    var promise = myVideo.pause();
//
//                    if (promise !== undefined) {
//                        promise.then(_ => {
//                            // Autoplay started!
//                        }).catch(error => {
//                            // Autoplay was prevented.
//                            // Show a "Play" button so that user can start playback.
//                        });
//                    }
//                }
//            }

        </script>

    </body>

    <script src='https://vjs.zencdn.net/7.5.4/video.js'></script>

</html>
