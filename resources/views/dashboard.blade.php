<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
  <script type="text/javascript" src="index.js"></script>
  <style>
    .error {
      color: red !important
    }
    .dash{
      height: 400px;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: bold;
      display: flex;
      color:green;
      flex-direction: column;

    }
  </style>
</head>

<body style="justify-content: center; text-align: center; margin-top: 50px;">

    <h1 style="text-align: center;"><b>Dashboard</b></h1>
        <!-- Show any success message -->
    @if (\Session::has('success'))
        <div class="alert alert-success">
            
            {!! \Session::get('success') !!}  
            
        </div>
    @endif
    <!-- Show any success message -->

    <!-- Check user is logged in -->
    @if(\Auth::check())

    <div style="justify-content: center;">
        <h3>Hello, {{\Auth::user()->name}}!</h3> <div>You are logged in as  : {{\Auth::user()->email}} ,  <a href="{{url('logout')}}"> Logout</a></div>  
        
        <img style="width: 750px;" src="https://64.media.tumblr.com/51015ec638a516f7f7d353ca198a5091/tumblr_pdbo9wBAe11xd0gvgo1_1280.gif" alt="">

        <!-- <h3><b>Your Projects</b></h3> -->
        <!-- <h4 class="alert alert-success">{{\Auth::user()->system}}</h4> -->

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><h3>Your Projects</h3></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                    <tr>
                        <th>{{$row->document_name}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @else
    <div class='dash '>
        <div class='error'> You are not logged in  </div>
        <div> <a href="{{url('login')}}">Login</a> | <a href="{{url('register')}}">Register</a> </div>
    </div>
        
    @endif

</body>
</html>