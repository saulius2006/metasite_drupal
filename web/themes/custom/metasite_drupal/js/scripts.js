(function ($, Drupal) {

    $(document).ready(function () {

        if($('#disclaimerModal')[0]) {
            $("#disclaimerModal").modal({
                'backdrop': 'static'
            });
            $('.node--type-article > .node__content > div').show();
            $('.node--type-article').addClass('blur');
        }


    });
})(jQuery, Drupal);
