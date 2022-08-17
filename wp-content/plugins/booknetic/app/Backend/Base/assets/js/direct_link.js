(function ($)
{
    "use strict";

    $(document).ready(function()
    {

        $(".select2").select2({
            theme:'bootstrap',
            minimumResultsForSearch: -1
        });

        const hostName = $('.bkntc_direct_booking_url .bkntc_link_output').text();

        function link_generate()
        {
            let urlObj = {};
            $('.bkntc_direct_booking_url .url_generate').each( function () {
                let param = $(this).attr('data-key');
                let val = $(this).val().trim();
                if( val !== '')
                {
                    urlObj[ param ] = val ;
                }
            });
            $('.bkntc_direct_booking_url .bkntc_link_output').text(hostName + "/?" + $.param( urlObj ));
        }

        $('.bkntc_direct_booking_url').on('change' ,'.url_generate' , link_generate );

        $('.bkntc_copy_clipboard').on('click' , function () {
            let val = $('.bkntc_direct_booking_url .bkntc_link_output').text().trim();
            navigator.clipboard.writeText( val );

            booknetic.toast( booknetic.__('link_copied'), 'success' );
        });

        link_generate();

    });

})(jQuery);
