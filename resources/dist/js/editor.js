var uploadUrl = '{{ config("larablog.routes.admin.edit.url") }}';
tinymce.init({
    selector: '#body',
    height: 500,
    menubar: false,
    plugins: [
        'advlist autolink lists link image anchor media table'
    ],
    toolbar: 'formatselect | bold italic underline backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent table | removeformat | image media anchor',
    image_title: true,
    automatic_uploads: true,
    images_upload_url: uploadUrl+'/upload',
    file_picker_types: 'image',
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', uploadUrl+'/upload');
        xhr.setRequestHeader('x-csrf-token', document.head.querySelector("[name=csrf-token]").content);
        xhr.onload = function() {
            var json;
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
            success(json.location);
        };
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    },

});

