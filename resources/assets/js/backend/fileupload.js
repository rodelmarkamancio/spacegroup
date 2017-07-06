$(document).ready(function()
{
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
});