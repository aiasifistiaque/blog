
@extends('Pages.Layouts.template')

@section('body')
  
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="col-md-12">
                    <br/>
                    <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-success btn-block">
                        <strong>Login With Facebook</strong>
                    </a> 
                </div>    
            </div>
        </div>
    </div>
   
@endsection