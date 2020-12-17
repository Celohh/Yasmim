var loadFile = function (event) {
    var output = document.getElementById('img_output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src)
    }
    if (output.src != "") {
        disableImageBackground();
    }
};

function disableImageBackground() {
    document.getElementById('img_selector-placeholder').style.display = "none";
    document.getElementById('img_selector').style.backgroundColor = "transparent";
    document.getElementById('img_selector').style.width = "auto";
}