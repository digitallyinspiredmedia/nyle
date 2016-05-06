jQuery(function(){

  jQuery('.wpcf7-form .input-group input').focusout(function(){

    var text_val = $(this).val();

    if(text_val === "") {

      jQuery(this).removeClass('has-value');

    } else {

      jQuery(this).addClass('has-value');

    }

  });

});
