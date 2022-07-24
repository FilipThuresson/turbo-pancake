$(function() {

    function toggleTrending(e) {
        e.preventDefault();
        $.ajax({
            url: "/api/toggleTrending",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: $(this).attr('id'),
                trending: ($(this).is(':checked') ? 1 : 0)
            },
            success: function(data) {
                console.log(data);
            }
        })
    }
    console.log("hello");
    $('body')
        .on('change', '.is_trending', toggleTrending)
});
