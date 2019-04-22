# Fractal UI
world's first fractal based user interface for multimedia websites

![Screenshot!](http://fractalui.tk/fractal.png "")

# Features!

  - Coverts browser window into Sierpinski's fractal UI
  - Use the grids to show multimedia contents
  - Use inbuild methods for fast development

### Installation

Just paste below lines at the end of your <body>
```
<link rel="stylesheet"  href="fractalui.css">
<script src="fractalui.js" 
        no_level="2" 
        background_color="#2196F3" 
        extra ="true"> 
</script>
```
Here, `num_level` is a parameter, which decides how many layers of the user interface to produce.
`background_color` parameter will change the default background color of grid-containers.

Provide initial grid-container 
```
<body>     
    <div class="grid-container" id="container"> </div>
</body>
```
# Thats it

*Place your multimedia data on different grids and you're good to go*

#### Methods available
```
getLayers(layer);
```
*returns an array of grid-items for given layer*
_________________
```
shuffle(id);
```
*Shuffles content of given layer id with center grid*
_________________

```
getNoOfItems(num);
```
returns an integer number with number of items will fit for given number of layers
_________________

```
isTheLastLayer(id);
```
Checks if the given layer id is last layer and returns boolean
_________________
### Output

![Screenshot!](http://fractalui.tk/capture.png "")


