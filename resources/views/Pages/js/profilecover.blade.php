<script>
        function changeProfile() {
            $('#file').click();
            
        }
        $('#file').change(function () {
            
            if ($(this).val() != '') {
                upload(this);
    
            }
        });
        function upload(img) {
            
            var form = new FormData();
            form.append('image', img.files[0]);
            form.append('_token', '{{csrf_token()}}');
            form.append('files', true);
            $('#loading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: '/ajax-image-upload',
                data: form,
                contentType: false,
                processData: false,
                cache: false,
                success: function (data) {
                    if (data.fail) {
                        $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                        alert(data.errors['file']);
                    }
                    else {
                        $('#file_name').val(data);
                        $('#preview_image').attr('src', data.src);
                    }
                    $('#loading').css('display', 'none');
                },
                error: function (xhr, status, error) {
                    alert('severe error '+xhr.responseText);
                    $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                }
            });
        }
</script>