$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$("#fileuploader").uploadFile({
        url: $('#form-assets').attr('action'),
        multiple: true,
        dragDrop: true,
        dragdropWidth: '100%',
        fileName: "photos",
        acceptFiles:"image/*",
        showPreview: true,
        previewHeight: "100px",
        previewWidth: "100px"
    });

    //
    // Homepage Edit file upload or select image

    // Open the modal
    $('.btn-select-image').on('click', function() {
        var getInputValue = $(this).data('input-value');

        $('.uploader-wrapper').fadeIn(300, function() {
            $(this).find('.content-uploader-list').attr('data-input-value', getInputValue);
            $(this).show();
        });
    });

    // Close the modal
    $('.btn-close').on('click', function() {
        $('.uploader-wrapper').fadeOut(300, function() {
            $(this).find('.content-uploader-list').removeAttr('data-input-value');
            $('.form-select-image').removeClass($('.btn-uploader-select').parents('.content-uploader-list').data('input-value'))
            $(this).hide();
        });
    });

    // Selecting an image to input in the form
    $(document).on('click', '.btn-uploader-select', function(e) {
        var getId = $(this).data('id'),
            getValue = $(this).parents('.img-effect').find('#image-display-' + getId).attr('src'),
            getValueStrip = getValue.substring(getValue.lastIndexOf("/") + -6, getValue.length),
            getInputValueAttr = $(this).parents('.content-uploader-list').attr('data-input-value');
            
            // inserting
            $('#' + getInputValueAttr).val(getValueStrip);
            
            // adding preview
            $('.form-select-image.' + getInputValueAttr + ' .upload-image-display').remove();
            $('.dashboard-home-container').find('[data-input-value="' + getInputValueAttr + '"]').addClass(getInputValueAttr);
            $('.form-select-image.' + getInputValueAttr +' > .btn-select').hide();
            $('.form-select-image.' + getInputValueAttr).css({ 'width': 300, 'height': '100%' });
            $('.form-select-image.' + getInputValueAttr).append(
                '<div class="upload-image-display .' + getInputValueAttr + '"><img src="' + getValue + '" /></div>'
            );

            // notification
            $('.content-alert').fadeIn(300, function() {
                $(this).html('You have inserted the image id ' + getId + '.');
                $(this).show();
            });

            setTimeout(function() {
                $('.content-alert').fadeOut(300, function() {
                    $(this).hide();
                });
            }, 2000);
        e.preventDefault();
    });
});