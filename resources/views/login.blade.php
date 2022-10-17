<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
  <!-- <script type="text/javascript" src="index.js"></script> -->
  <style>
    .error {
      color: red
    }
  </style>
</head>
<!-- <body class="antialiased"> -->
<body class="antialiased" style="background: url('https://i.pinimg.com/originals/54/f8/13/54f81331a9da88c623b96363fb0a4da1.gif') no-repeat center center fixed; background-size: 100%; ">
  <div class="container" >
    <!-- main app container -->
    <div class="readersack">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3" style="margin-top: 200px; padding: 30px; border: 0.5px solid grey; border-radius: 4px; background-color: white; opacity: 0.9;">
            <h3>Login</h3>
            &nbsp;
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" id="handleAjax" action="{{url('do-login')}}" name="postform">
              <div class="form-group">
                <label>Name</label>
                <input type="name" name="name" value="{{old('name')}}"  class="form-control" />

                @csrf
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" />
              </div>
              <div style="display: flex;">
                <div class="form-group">
                  <button type="submit" class="btn" style="background-color: #ec9c9c; font-family: 'Dosis', sans-serif; font-weight: 600; color: white;">LOGIN</button>
                </div>
                <div class="form-group" style="padding-top: 7px; margin-left: 5px;">          
                  <a style="border-radius: 4px; padding: 8.5px; background-color: grey; color: white; text-decoration: none;" href="/register">REGISTER</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</body>

</html>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&display=swap');

  body{
    font-family: 'Dosis', sans-serif;
  }
</style>
