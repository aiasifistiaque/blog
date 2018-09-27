<script>
        $(document).ready(function(){
            $(#approveButton).click(function(){
                var form = new FormData();
                form.append('_token', '{{csrf_token()}}');
                $.ajax({
                     url: '/postapproval',
                     type: 'POST',
                     data: form,
                     contentType: false,
                     processData: false,
                     cache: false,
                     success: function(data){
                         $(#statusPost).html('<p>post is approved</p>s');

                     }


                });


            });
            
        });
     </script>