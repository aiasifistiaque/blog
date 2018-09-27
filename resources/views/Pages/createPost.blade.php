@extends('Pages.Layouts.template')
@section('head')
      <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      
@endsection

@section('title','create')
@section('body')
      <div class="container">
            <br/>
            @include('Pages.Layouts.writeform')
      </div>

      <script>  
            CKEDITOR.replace( 'article-ckeditor', {
                  filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',
                  removeButtons: 'Source,Anchor,Styles,Underline,SpellChecker',
                  removePlugins: 'image',
                  extraPlugins: 'image2'                          
                  });
      </script>
@endsection