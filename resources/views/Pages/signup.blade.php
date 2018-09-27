<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <title>BLOG</title>

      
    </head>
    <body>
        

        <div class="container">
            <form action="/create" method="post">

                <div class="form-group row">
                    <input type = "hidden" name = "_token"  value = {{ csrf_token() }}>
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="First Name">
                    <br/>

                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                    <br/>
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email Address">
                    <br/>

                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="First Name">
                    <br/>
                    

                    <br/>
                    <input class="btn btn-success btn-block" type="submit" value="submit">

                </div>
            </form>
            
        </div>
        
    </body>
</html>
