var sliderDiv = document.getElementsByClassName('slider-content');
index = 0;

var intervalID = window.setInterval(sliderChange, 3500);

function sliderChange() {
    sliderDiv[index].classList.remove('active');
        sliderDiv[index].classList.add('not-active');
       
        index++;
        if(index== sliderDiv.length) index=0;
    
        sliderDiv[index].classList.add('active');
        sliderDiv[index].classList.remove('not-active');
 
}

document.getElementsByClassName('slider')[0].addEventListener('onload',sliderChange);