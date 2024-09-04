jQuery(document).ready(function($) {
    $( "#load-more" ).on( "click", function() {
        var load_more_button = $(this);
        var current_page = load_more_button.data('paged');
        var next_page = current_page + 1;


        $.ajax({
            url: act_data.act_ajax_url,
            type: 'POST',
            data:{
                action: 'actcourse_load_more_services',
                page: next_page,
                posts_per_page: act_data.posts_per_page
            },
            beforeSend: function() {
                load_more_button.text(act_data.texts.loading ); // Translate.
            },
            success: function( response ) {
                if (response !== 0 ) {
                    $('.services-list').append( response );
                    load_more_button.data( 'paged', next_page );
                    load_more_button.text(act_data.texts.loadmore ); // Translate.
                } else {
                    load_more_button.text(act_data.texts.nomoreservices ); //translate.
                    load_more_button.prop('disabled', true );
                }
            },
            error: function(xhr, status, error) {
                load_more_button.text(act_data.texts.nomoreservices ); //translate.
                load_more_button.prop('disabled', true );
            }
        });
    } );

    // Contact form.
    $('#contact-us-form').on('submit', function(e) {
        e.preventDefault();

        var form = $(this);
        var formData = form.serialize();

        $.ajax({
            url: act_data.act_ajax_url,
            type: 'POST',
            data:{
                action: 'actcourse_contact_us_send_email',
                form_data :  formData,
                contact_nonce : $('#contact_nonce').val()
            },
            beforeSend: function() {
                $('.loading').show();
                $('.error-message').hide();
                $('.sent-message').hide();
            },
            success: function( response ) {
                $('.loading').hide();

                if ( response.success === true ) {
                    $('.sent-message').html( response.data );
                    $('.sent-message').show();
                } else {
                    $('.error-message').html( response.data );
                    $('.error-message').show();
                }
            }
        });
    });
});
