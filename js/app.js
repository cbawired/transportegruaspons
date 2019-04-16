$(window).scroll(function(){
    if($(document).scrollTop()>100){
        $('#introduccion').hide('slow');
        $('#navegador').show('slow')
    }else{
        $('#introduccion').show('slow');
        $('#navegador').hide('slow');
    }
});


$(document).ready(function(){
    // desaparecer intro con el scroll
    
})
