<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Registration Form</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
  <script type="text/javascript" src="index.js"></script>
  <style>
    .error {
      color: red
    }
  </style>
</head>
<body class="antialiased" style="background: url('https://i.pinimg.com/originals/54/f8/13/54f81331a9da88c623b96363fb0a4da1.gif') no-repeat center center fixed; background-size: 100%;">
  <div class="container">
    <!-- main app container -->
    <div class="readersack">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3" style="margin-top: 100px; padding: 30px; border: 0.5px solid grey; border-radius: 4px; background-color: white; opacity: 0.9;">
            <div style="display: flex;">
              <div>
                <h3>Register</h3>
              </div>
              
              <div style="margin-left: 370px;">
                <a href="/login">
                  <button style="font-size: 20px; border: none; background-color: white; cursor: pointer;">x</button>
                </a>
              </div>
            </div>
            
            &nbsp;

            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="post" id="handleAjax" action="{{url('do-register')}}" name="postform">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" />
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control" />
                @csrf
              </div>
              <div class="form-group">
                <label>Employee no.</label>
                <input type="number" name="employee_no" class="form-control" />
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" />
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" />
              </div>
            <div class="form-group">
                <button type="submit" class="btn" style="background-color: #ec9c9c; color: white;">REGISTER</button>
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
