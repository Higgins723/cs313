function week02Alert()
{
    alert("Clicked!");
};

$(function changeColor(color){
    console.log(color);
    $(".div1").css("background", color);
}); 

$("#colorChange").click(function(){
    changeColor($('.newcolor').val());
});
