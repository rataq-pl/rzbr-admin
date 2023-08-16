function handler(blobInfo, success, failure, progress){
    var xhr, formData;
    console.log($('meta[name="csrf-token"]').attr('content'))
    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.setRequestHeader('_token', $('meta[name="csrf-token"]').attr('content'))
    xhr.open('POST', '/uploader/b64');

    xhr.upload.onprogress = function (e) {
        progress(e.loaded / e.total * 100);
    };

    xhr.onload = function() {
        var json;

        if (xhr.status === 403) {
        failure('HTTP Error: ' + xhr.status, { remove: true });
        return;
        }

        if (xhr.status < 200 || xhr.status >= 300) {
        failure('HTTP Error: ' + xhr.status);
        return;
        }

        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
            console.log(xhr.responseText)
        failure('Invalid JSON: ' + xhr.responseText);
        return;
        }

        success(json.location);
    }
    xhr.onerror = function () {
        failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };
    formData = new FormData();
    formData.append('image', blobInfo.blob(), blobInfo.filename());
    xhr.send(formData);
}

            tinymce.init({
                selector: '.tinymce',
                plugins: [
                    'image', 'wordcount', 'table', 'visualblocks', 'searchreplace', 'save', 'quickbars', 'preview', 'media', 'lists', 'link', 'insertdatetime', 'importcss', 'fullscreen', 'emoticons', 'autolink', 'advlist', 'charmap', 'code', 'codesample'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
                images_upload_url: '/uploader/b64',
                automatic_uploads: true
            });
            window.addEventListener('load', function(){
                $('.tox-promotion').remove();
                $('.tox-statusbar__branding').remove();
            })

window.addEventListener('load', function(){
    var el = document.getElementById('sortableElement');
    Sortable.create(el, {
        axis: 'y',
        onEnd: function (){
            var elements = document.getElementById('sortableElement').getElementsByTagName('tr')
            var tab = []
            for(let i=0;i<elements.length;i++){
                tab.push(elements[i].getAttribute('id').replace('element_', ''))
            }
            axios.post('/fAQS/ordering', JSON.stringify({
                tab: tab
            }), {
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }).then(function(response){
                alertify.notify('Kolejność zmieniona prawidłowo.', 'success', 5, function(){  console.log('dismissed'); });
            }).catch(function(err){
                console.log(err.response.data.message)
            })
        }
    });

})