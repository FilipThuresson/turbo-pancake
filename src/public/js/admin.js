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
            beforeSend: function () {
                $('.lds-dual-ring').toggleClass('hidden');
            },
            success: function(data) {
                if(data == 1){
                    $('.lds-dual-ring').toggleClass('hidden');
                }
                else{
                    alert('error ajax');
                }
            }
        })
    }

    function imageUpload(e) {
        input = this;

        $('.image-wrapper').html('');
        $('#thumbnail-select').html('<option value="0">No Thumbnail</value>');

        if (input.files.length > 0) {
            $.each(input.files, function(idx,file){
                console.log(e);
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-wrapper').append(`
                        <img class="uploaded-image" src="${ e.target.result }" alt="Your image" />
                    `);
                    $('#thumbnail-select').append(`
                        <option value="${ file.name }">#: ${idx + 1} : ${file.name}</option>
                    `);
                }

                reader.readAsDataURL(file);
            })
        }
    }

    function clearAlert() {
        $(this).fadeOut();
    }

    $('body')
        .on('click', '.js-alert', clearAlert)
        .on('change', '.is_trending', toggleTrending)
        .on('change', '#picture-input', imageUpload)

});
