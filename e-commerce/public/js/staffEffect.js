(function(){
    var $switchOFF = $('.manage > .ordersTable .SwitchOFF');
    var $switchON = $('.manage > .ordersTable .SwitchON');
    
    /* manage buttons for status order */
    $switchOFF.on('click', function(){
        $(this).css('display','none');

        $.ajax({
            url:'/staff/statusOn/{cod_order}',
            type: 'POST',
            data: {
               'cod_order': $(this).attr('name'),
               "_token": $('#token').val()
            },
            success: function(response){
                console.log("success alter value " + response);
            },
            error: function(){
                console.log("error alter value");
            }
        });

        $(this).parent().children('.SwitchON').css('display','inline');
    });

    $switchON.on('click', function(){
        $(this).css('display','none');

        $.ajax({
            url:'/staff/statusOff/{cod_order}',
            type: 'POST',
            data: {
               'cod_order': $(this).attr('name'),
               "_token": $('#token').val()
            },
            success: function(response){
                console.log("success alter value " + response);
            },
            error: function(){
                console.log("error alter value");
            }
        });

        $(this).parent().children('.SwitchOFF').css('display','inline');
    });
})();