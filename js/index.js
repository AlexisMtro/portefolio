$(document).ready(function(){
	$(".dropdown-trigger").dropdown();
    $(".button-collapse").sideNav();
});

jQuery(document).ready(function(){
    jQuery('.skillbar').each(function(){
        jQuery(this).find('.skillbar-bar').animate({
            width:jQuery(this).attr('data-percent')
        },6000);
    });
});
