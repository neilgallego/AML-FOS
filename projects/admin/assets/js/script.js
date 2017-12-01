$(document).ready(function){
    $("#index a:contains('Dashboard')").parent().addClass('active-menu');


    $('ul.nav li.dropdown').hover(function(){
        $('.dropdown-menu', this).fadeIn();
    }, function(){
        $('.dropdown-menu', this).fadeOut('fast');
    }

    })
}