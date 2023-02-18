$('#file').change(function() {
    let fomData = new FormData();
    fomData.append('file', $('#file')[0].files[0]);
    $.ajax({
        type: "POST",
        url: '/admin/upload',
        data: fomData,
        dataType: "JSON",
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.error) {
                alert(response.message);
            } else {
                $('.show-image').removeClass('d-none');
                $('#thumb_href').attr('href', response.url);
                $('#thumb_url').attr('src', response.url);

                $('input[name="thumb"]').val(response.url);
            }
        }
    });
});
