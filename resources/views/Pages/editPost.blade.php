@extends('Pages.Layouts.template')
@section('head')
      <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
@endsection

@section('title','create')
@section('body')
    @foreach ($story as $story)
        <br><br>
        <div class="container">
            <h2 class="text-center">Edit a Post</h2> 
            </br>

            {!!Form::open(['url'=> 'editpost/'.$story->id]) !!}
            {{Form::label('title','Enter the title of the post')}}
            {{Form::text('title', $story->title,['class'=>'form-control','placeholder'=>'Title','required'])}}
            {{Form::label('written by','written by')}}   

            <div class="alert alert-primary" role="alert" style="background:white" >
                <h5> {{ $name=Auth::user()->name }} </h5>
            </div>

            {{Form::label('body','Post Body')}}
            {{Form::textarea('body', $story->body,['class'=>'form-control','placeholder'=>'Body','id'=>'article-ckeditor','required'])}}
            <br/>
            {{Form::submit('submit the article',['class'=>'btn btn-block btn-success'])}}               
            {!!Form::close()!!}
        </div>
    @endforeach
        
        <script>
            CKEDITOR.replace( 'article-ckeditor', {
                  filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',
                  removeButtons: 'Source,Anchor,Styles,Underline,SpellChecker',
                  removePlugins: 'image',
                  extraPlugins: 'image2'                          
            });           
        </script>
      
@endsection