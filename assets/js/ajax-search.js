jQuery(function ($) {
    let searchTerm = '';
    const searchInput = $('#s');
    const searchSpinner = $('.search__spinner')
    const searchList = $('.search__list');

    $('#search-form').submit(function (event) {
        event.preventDefault()
    });

    searchInput.keydown(function () {
        searchTerm = $.trim($(this).val());
    });

    searchInput.keyup(function () {
        if ($.trim($(this).val()) !== searchTerm) {
            searchTerm = $.trim($(this).val());
            if (searchTerm.length > 2) {
                $.ajax({
                    url: ajaxSearch.ajax_url,
                    type: 'POST',
                    data: {
                        'action': 'iineretin_ajax_search',
                        'term': searchTerm
                    },
                    beforeSend: function () {
                        searchList.fadeOut();
                        searchList.empty();
                        searchSpinner.show();
                    },
                    success: function (result) {
                        searchSpinner.hide();
                        searchList.fadeIn().html(result);
                    }
                });
            }
        }
    });

    searchInput.focusin(function () {
        searchList.fadeIn();
    })

    $(document).mouseup(function (e) {
        if ((!searchList.is(e.target) && searchList.has(e.target).length === 0) && (!searchInput.is(e.target) && searchInput.has(e.target).length === 0)) {
            searchList.fadeOut();
        }
    });
})