function selectColor(color) {
    // remove the selected class from all color options
    var colors = document.getElementsByClassName("color");
    for (var i = 0; i < colors.length; i++) {
        colors[i].classList.remove("selected");
    }
    // add the selected class to the chosen color option
    var chosen = document.getElementById(color);
    chosen.classList.add("selected");
    }
    
    function selectSize(size) {
    // remove the selected class from all size options
    var sizes = document.getElementsByClassName("size");
    for (var i = 0; i < sizes.length; i++) {
        sizes[i].classList.remove("selected");
    }
    // add the selected class to the chosen size option
    var chosen = document.getElementById(size);
    chosen.classList.add("selected");
    }