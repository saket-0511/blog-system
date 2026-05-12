$(document).ready(function () {

    // Debounce helper
    function debounce(fn, delay) {
        let timer;
        return function () {
            clearTimeout(timer);
            timer = setTimeout(fn, delay);
        };
    }

    // Main AJAX fetch function
    function fetchBlogs() {
        var category = $('#filter-category').val() || 'all';
        var date     = $('#filter-date').val()     || '';
        var search   = $('#search-input').val()    || '';

        // Show loading spinner
        $('#blogs-container').html(
            '<div class="col-12 text-center py-5">' +
            '<div class="spinner-border text-primary" role="status"></div>' +
            '<p class="text-muted mt-2 small">Loading blogs...</p>' +
            '</div>'
        );
        $('#pagination-container').html('');

        $.ajax({
            url: window.blogsUrl || '/',
            method: 'GET',
            data: {
                category : category !== 'all' ? category : '',
                date     : date,
                search   : search
            },
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (response) {
                $('#blogs-container').html(response.html);
                $('#pagination-container').html(response.pagination);

                // Update results count text if element exists
                var countMatch = response.html.match(/data-total="(\d+)"/);
                // (count is embedded in the JSON by the controller)
            },
            error: function (xhr) {
                $('#blogs-container').html(
                    '<div class="col-12">' +
                    '<div class="alert alert-danger">' +
                    '<i class="bi bi-exclamation-triangle me-2"></i>' +
                    'Something went wrong. Please try again.' +
                    '</div></div>'
                );
            }
        });
    }

    // --- Event bindings ---

    // Category dropdown: fetch immediately on change
    $('#filter-category').on('change', function () {
        fetchBlogs();
    });

    // Date picker: fetch immediately on change
    $('#filter-date').on('change', function () {
        fetchBlogs();
    });

    // Search input: debounced (400ms after last keystroke)
    $('#search-input').on('keyup input', debounce(fetchBlogs, 400));

    // Clear all filters button
    $('#clear-filters').on('click', function () {
        $('#filter-category').val('all');
        $('#filter-date').val('');
        $('#search-input').val('');
        fetchBlogs();
    });

    // Handle paginator links injected via AJAX (event delegation)
    $(document).on('click', '#pagination-container a', function (e) {
        e.preventDefault();
        var url  = $(this).attr('href');
        var category = $('#filter-category').val() || '';
        var date     = $('#filter-date').val()     || '';
        var search   = $('#search-input').val()    || '';

        $('#blogs-container').html(
            '<div class="col-12 text-center py-5">' +
            '<div class="spinner-border text-primary" role="status"></div>' +
            '</div>'
        );

        $.ajax({
            url: url,
            method: 'GET',
            data: { category: category, date: date, search: search },
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            success: function (response) {
                $('#blogs-container').html(response.html);
                $('#pagination-container').html(response.pagination);
                $('html, body').animate({ scrollTop: $('#blogs-container').offset().top - 80 }, 300);
            }
        });
    });

});
