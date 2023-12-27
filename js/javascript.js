var slider = ["image/Slide/s1.jpg","image/Slide/s2.jpg","image/Slide/s3.jpg",
              "image/Slide/s4.jpg","image/Slide/s5.jpg"];

var currentIndex = 0;
function changeImage() {
    // Switch currentIndex in a loop
    currentIndex++;
    if (currentIndex >= slider.length)
        currentIndex = 0;

    var img = document.getElementById('slidee');
    img.src = slider[currentIndex];
}

window.onload=function(){
    setInterval(changeImage, 5000);
}