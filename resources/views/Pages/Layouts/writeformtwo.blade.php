
{!!Form::open(array('url' => '/createpost', 'files' => 'true')) !!}
{{Form::label('title','Enter the title of the post', ['class' => 'w3-allerta'])}}
{{Form::text('title', '',['class'=>'form-control','placeholder'=>'Title','required'])}}
<br>
{{Form::label('cover','upload Cover', ['class' => 'w3-allerta'])}}
{{Form::file('image', ['class' => 'w3-allerta btn','required'])}}
<br>

{{Form::label('written by','Author' , ['class' => 'w3-allerta'])}}   

<div class="alert alert-secondary" role="alert" >
      {{ $name=Auth::user()->name }} 
</div>
{{Form::label('Catagory','Select a catagory', ['class' => 'w3-allerta'])}}
<div class="form-control">
   {{Form::select('catagory', ['Food' => 'Food', 'Travel' => 'Tavel','Science' => 'Science', 'Horror' => 'Horror', 'Tech' => 'Tech'])}}
</div>

{{Form::label('body','Post Body', ['class' => 'w3-allerta'])}}
{{Form::textarea('body', '',['class'=>'form-control','placeholder'=>'Body','id'=>'article-ckeditor','required','rows'=>'20'])}}
<br/>
{{Form::submit('submit the article',['class'=>'btn btn-block btn-secondary'])}}               
{!!Form::close()!!}
</div>
<br><br><br>

<script>  
               CKEDITOR.replace( 'article-ckeditor' );


</script>