var photos = new Array();
var no_level = document.currentScript.getAttribute('no_level');
var pic_id = 0;
var grid_containers = document.getElementsByClassName("grid-container");


for (var i = 0; i < grid_containers.length; i++)
{
    grid_containers.item(i).style.background = document.currentScript.getAttribute('background_color');
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
            devideIntoNine(divparent, id)
            devide(document.getElementById(id), level, id);
        }
    }
}
function makeGrid(divparent, id) {

    var para = document.createElement("div");
    para.setAttribute("class", "grid-item");
    para.setAttribute("id", id);
    var p = document.createElement("img");
    p.setAttribute("class", "grid-item-image");
    p.setAttribute("id", id);
    p.setAttribute("onclick", "imageClick('" + id + "')");
    pic_id++;
    para.appendChild(p);
    divparent.appendChild(para);
}
function devideIntoNine(divparent, id) {

    divparent.style.gridTemplateColumns = "1fr 1fr 1fr";

    divparent.style.gridTemplateRows = "1fr 1fr 1fr";

    var para = document.createElement("div");
    para.setAttribute("class", "grid-container");
    para.setAttribute("id", id);
    divparent.appendChild(para);
}




function shuffle(id) {
    var center = document.getElementById("0 1 1 5");
    var side = document.getElementById(id);

    var temp = side.innerHTML;
    temp.innerHTML.pr
    side.innerHTML = center.innerHTML;
    center.innerHTML = temp;
}


function isTheLastLayer(id) {

    var str = id;
    var stringArray = str.split(/(\s+)/).filter(function (e) {
        return e.trim().length > 0;
    });
    ;
    return stringArray.length == (no_level * 2) + 2;
}



function getLayers(layer) {

    var result = new Array();
    if(layer == 1){
        return document.getElementById("0 1 1 5");
    }else{
        var elements = document.getElementsByClassName("grid-item");
            Array.prototype.forEach.call(elements, function (el) {
                var id_length = el.id.length;
                if (id_length == (layer*4)+3) {
                    result.push(el);
                }
            });
            return  result;
    }
}




function isTheLastLayer(id) {

    var str = id;
    var stringArray = str.split(/(\s+)/).filter(function (e) {
        return e.trim().length > 0;
    });
    ;
    return stringArray.length == (no_level * 3);
}



function getNoOfImages(num) {
    var result = 0;
    for (var i = 0; i < num; i++) {
        result += Math.pow(8, i);
    }
    return result;
}



devide(document.getElementById("container"), 0, "0 1");
console.log(getLayers(4));


var elem = document.getElementsByClassName("grid-item"); // or:

//shuffle(elem[0]);
