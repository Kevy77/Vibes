$(document).ready(function() {
    $(".search_bar").hide();
    $("aside.left").hide();
    $("#follow_list").hide();
    $("#coupcoeur").hide();
    $('#search').click(function(e) {
        e.preventDefault();
        $(".search_bar").fadeToggle(600);
    });
    $('.hamburger').click(function(e) {
        e.preventDefault();
        $(".full_page").toggleClass('slide');
        $(".hover_ap").toggleClass('all__');
        $("aside.left").fadeToggle(600);
    });
    $('#heart_btn').click(function(e) {
        e.preventDefault();
        $("#musique").slideUp(600);
        $("#follow_list").slideUp(600);
        $("#coupcoeur").fadeIn(600);
    });
    $('#follow_btn').click(function(e) {
        e.preventDefault();
        $("#musique").slideUp(600);
        $("#coupcoeur").slideUp(600);
        $("#follow_list").fadeIn(600);
    });
    $('#home_btn').click(function(e) {
        e.preventDefault();
        $("#musique").slideUp(600);
        $("#coupcoeur").slideUp(600);
        $("#follow_list").slideUp(600);
        $("#musique").fadeIn(600);
    });
});
