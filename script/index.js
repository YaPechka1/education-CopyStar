let srcs = document.querySelectorAll('.card');
let selected =0;
selectSlide(0);
function selectSlide(index){
    srcs[selected].style.display = 'none';
    selected+=index;
    if (selected<0) selected=srcs.length-1;
    else if (selected>srcs.length-1) selected=0;
    srcs[selected].style.display = 'flex';
}