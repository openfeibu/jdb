$(function(){
    $("header .menu").on("click",function(){
        $(".nav").slideDown(300)
    })
    $(".nav .close").on("click",function(){
        $(".nav").slideUp(300)
    })
    $(".nav .moreAction").on("click",function(){
        $(this).toggleClass("active");
        $(this).next('ul').slideToggle(200)
    })
})