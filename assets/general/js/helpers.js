//====================== This Helpers File For All Part =======================
function notifyEvs(type, message) {
    "use strict";
    let title = type;
    new Notify({
        status: type,
        title: title.charAt(0).toUpperCase() + title.slice(1),
        text: message,
        effect: 'slide',
        speed: 500,
        customClass: '',
        customIcon: '',
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 2300,
        gap: 20,
        distance: 20,
        type: 1,
        position: 'right top',
        customWrapper: '',
    })

}

function readURL(input, imagePreview) {
    'use strict';
    // Check if there is a selected file
    if (input.files && input.files[0]) {
        // Create a new FileReader
        var reader = new FileReader();
        // Define the onload event
        reader.onload = function(e) {
            // Set the background image of the image preview element
            imagePreview.css('background-image', 'url(' + e.target.result + ')');
            // Hide the image preview and then fade it in
            imagePreview.hide().fadeIn(400);
        };
        // Read the data URL of the selected file
        reader.readAsDataURL(input.files[0]);
    }
}

// Function to handle image preview for dynamically added elements
function handleImagePreview() {
    'use strict';
    var hostname = window.location.hostname;
    $(".imageUpload").change(function() {
        var previewId = $(this).data("preview-id");
        var imagePreview = $("#" + previewId);
        readURL(this, imagePreview);
    });
    $(".imageRemove").on('click', function(event) {
        var previewId = $(this).prev().data("preview-id");
        var imagePreview = $("#" + previewId);

        // Change to default placeholder image using the hostname
        imagePreview.css('background-image', 'url(http://' + hostname + '/assets/general/static/placeholder.png)');
        // Set value to indicate removal
        var imageInput = $("#" + previewId+"-remove");
        imageInput.val('coevs-remove');

        var imageNameInput = $("#" + previewId + "_upload");
        imageInput.attr('name', imageNameInput.attr('name'));
    });
}
handleImagePreview()

function deleteItem(url, text = "You won't be able to revert this!") {
    Swal.fire({
        title: "Are you sure?",
        text: text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    notifyEvs(data['status'], data['message']);
                    setTimeout(function(){
                        location.reload();
                    }, 1300);
                }
            });
        }
    });
}
function generateSlug(value) {
    return value.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
}