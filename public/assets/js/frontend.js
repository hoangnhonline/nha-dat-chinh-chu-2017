var Common = {
    loadDataAjax: function() {
        $(document).on('change', 'select.load-ajax', function() {
            var val = $(this).val();
            var href = $(this).data('href');
            href = href.replace('/0', '/' + val);
            var select = $(this).data('for');

            $.ajax({
                url: href,
                method: 'get',
                success: function(response) {
                    if (response.error == 0) {
                        $(select).children(':gt(1)').remove();
                        var id = $(select).data('id');

                        if (response.html != '') {
                            $(select)
                                .append(response.html)
                                .trigger('change');
                        }
                    }
                }
            });
        });
    }
};