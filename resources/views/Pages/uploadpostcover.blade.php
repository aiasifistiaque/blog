<html>
   <body>      
      {!! Form::open(array('url' => '/changepostcover/'.$id, 'files' => 'true')) !!}
      {{ 'Select the file to upload.' }}
      {{ Form::file('image') }}
      {{ Form::submit('Upload File') }}
      {{ Form::close() }}      
   </body>
</html>