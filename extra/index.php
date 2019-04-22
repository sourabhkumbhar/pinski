<html>
    <head>
        <style>


            html, body {
                margin: 0 auto; 
                height: 100%; 
                width: 100%;

            }
            * {
                box-sizing: border-box;
            }
            .grid-container {
                display: grid;
                background-color: #2196F3;
                width: 100%;
                height: 100%;
                /*border: 0.2px dotted #000;*/
            }

            div.grid-item {
                background-color: rgba(255, 255, 255, 0.8);
                width: 100%;
                height: 100%;
                /*border: 1px solid #fff;*/
                border-radius: 10px;
                /*background-color: white;*/
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            div.grid-item img, div.grid-item-extra img{
                object-fit: cover;
                transition: all .2s ease-in-out;;
                margin: 0 auto;
                max-width: 100%;
                max-height: 100%;
                width:100%;
                height: 100%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            }

            div.grid-item img:hover, div.grid-item-extra img:hover {
                -ms-transform: scale(2); /* IE 9 */
                -webkit-transform: scale(2); /* Safari 3-8 */
                transform: scale(2); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            div.grid-item-extra {

                background-color: rgba(255, 255, 255, 0.8);
                width: 100%;
                height: 100%;
                /*border: 1px solid #fff;*/
                padding: 10%;
                /*background-color: white;*/
            }

            .grid-item-image-1:hover {
                -ms-transform: scale(2); /* IE 9 */
                -webkit-transform: scale(2); /* Safari 3-8 */
                transform: scale(2); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .grid-item-image-2:hover {
                -ms-transform: scale(4); /* IE 9 */
                -webkit-transform: scale(4); /* Safari 3-8 */
                transform: scale(4); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .grid-item-image-3:hover {
                -ms-transform: scale(6); /* IE 9 */
                -webkit-transform: scale(6); /* Safari 3-8 */
                transform: scale(6); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .grid-item-image-4:hover {
                -ms-transform: scale(8); /* IE 9 */
                -webkit-transform: scale(8); /* Safari 3-8 */
                transform: scale(8); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
        </style>
    </head>
    <body>

        <?php
        $url = "https://api.pexels.com/v1/search?query=cars&per_page=9&page=1";


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

        function request($method, $url, $header) {
            $opts = array(
                'http' => array(
                    'method' => $method,
                ),
            );

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

        <div class="grid-container" id="container">
        </div>

        <script>


            var photos = new Array();
            var no_level = 2;
            var pic_id = 0;

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
                        divideIntoNine(divparent, id)
                        devide(document.getElementById(id), level, id);
                    }
                }
            }


            function getLevelById(id) {
                var length = id.length;
                return (length - 3) / 4;
            }

            function shuffle(id) {
                var center = document.getElementById("0 1 1 5").getElementsByTagName("img")[0];
                var side = document.getElementById(id).getElementsByTagName("img")[0];
                var temp = center.src;
                center.src = side.src;
                side.src = temp;
            }

            function makeGrid(divparent, id) {

                var para = document.createElement("div");
                para.setAttribute("class", "grid-item");
                para.setAttribute("id", id);

                var p = document.createElement("img");
                p.setAttribute("class", "grid-item-image-" + getLevelById(id));
                p.setAttribute("id", id);
                p.setAttribute("src", photos[pic_id]);
                p.setAttribute("onclick", "imageClick('" + id + "')");

                pic_id++;
                para.appendChild(p);

                divparent.appendChild(para);

            }

            function divideIntoNine(divparent, id) {

                divparent.style.gridTemplateColumns = "1fr 1fr 1fr";
                divparent.style.gridTemplateRows = "1fr 1fr 1fr";
                var para = document.createElement("div");
                para.setAttribute("class", "grid-container");
                para.setAttribute("id", id);
                divparent.appendChild(para);

                if (isTheLastLayer(id)) {

                    var extra = document.createElement("div");
                    extra.setAttribute("class", "grid-item-extra");
                    extra.setAttribute("id", id);

                    var p = document.createElement("img");
                    p.setAttribute("class", "grid-item-image-" + getLevelById(id));
                    p.setAttribute("id", id);
                    p.setAttribute("src", photos[pic_id]);
                    p.setAttribute("onclick", "imageClick('" + id + "')");

                    pic_id++;
                    extra.appendChild(p);

                    para.appendChild(extra);

                }
            }
            function imageClick(id) {
                shuffle(id);
            }


            function getNoOfImages(num) {
                var result = 0;
                for (var i = 0; i < num; i++) {
                    result += Math.pow(8, i);
                }
                return result;
            }

            function isTheLastLayer(id) {

                var str = id;
                var stringArray = str.split(/(\s+)/).filter(function (e) {
                    return e.trim().length > 0;
                });
                ;
                return stringArray.length == (no_level * 2) + 2;
            }


            var request = new XMLHttpRequest();
            var noOfImages = getNoOfImages(no_level);
//            var path = "https://api.pexels.com/v1/search?query=animal&per_page=" + noOfImages + "&page=1";
            var path = "https://api.pexels.com/v1/search?query=bikes&per_page=320&page=1";

            request.onreadystatechange = state_change;

            request.open("GET", path, true);
            request.setRequestHeader("Authorization", "563492ad6f917000010000018df40765920741cabbc60ff911c75a16");


            request.send(null);
            function state_change()
            {
                if (request.readyState == 4)
                {// 4 = "loaded"
                    if (request.status == 200)
                    {// 200 = OK
                        // ...our code here...
                        var data = request.responseText;
                        var jsonResponse = JSON.parse(data)['photos'];
                        console.log(jsonResponse);

                        for (var i = 0; i < jsonResponse.length; i++) {
                            var obj = jsonResponse[i]['src']['large'];
                            photos.push(obj);
                        }

                        devide(document.getElementById("container"), 0, "0 1");

                    } else
                    {
                        alert("Problem retrieving XML data");
                    }
                }
            }
        </script>

    </body>
</html>
