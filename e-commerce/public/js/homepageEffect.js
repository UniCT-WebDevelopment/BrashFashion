(function(){
    var $firstext = $(".first-section");
    var $secondtext = $(".third-section");
    var $navbar = $(".menu"); 

    $( window ).scroll(function() {
        var value = window.scrollY;
        
        //for animating initial texts
        if(value+300 < 800){
            $firstext.css( "left", `${(-value) * 0.5}px` );
            $firstext.css( "top", `${(value) * 1.50 + 90}px` );
            $secondtext.css( "top", `${(value) * 1.50 + 200}px` );

            $firstext.css('display', 'inline');
            $secondtext.css('display', 'inline');
        } else {
            $firstext.css('display', 'none');
            $secondtext.css('display', 'none');
        }

        //for navbar color
        if(value >= 225){
            $navbar.css('background-color', 'whitesmoke');
        } else {
            $navbar.css('background-color', 'white');
        }

        //console.log(value);
        //for opacity of sections..

        /* DESCRIPTION */
        var $descrSection = $(".description-section");
        if(value >=530){
            $descrSection.css('opacity', '+=0.03');
        } else {
            $descrSection.css('opacity', '-=0.05');
        }

        /* MAN */
        var $manSection = $(".male");
        if(value >=1266){
            $manSection.css('opacity', '+=0.03');
        } else {
            $manSection.css('opacity', '-=0.05');
        }

        /* WOMAN */
        var $femaleSection = $(".female");
        if(value >=2280){
            $femaleSection.css('opacity', '+=0.03');
        } else {
            $femaleSection.css('opacity', '-=0.05');
        }

        /* BABY */
        var $babySection = $(".baby");
        if(value >=3320){
            $babySection.css('opacity', '+=0.03');
        } else {
            $babySection.css('opacity', '-=0.05');
        }

        /* FORM SUBSCRIBE */
        var $subscribeSection = $(".subscribe-form");
        if(value >=4232){
            $subscribeSection.css('opacity', '+=0.03');
        } else {
            $subscribeSection.css('opacity', '-=0.05');
        }
    });

    $(".logged").on('click', function(){
        var $log = $('.navlogin');

        if($log.css('display') == 'none')
            $log.css('display', 'block');
        else
            $log.css('display', 'none');
    });


})();
