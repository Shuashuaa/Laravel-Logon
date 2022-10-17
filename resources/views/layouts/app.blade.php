<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shuashua</title>
</head>
<body>
    <div id="app"></div>
    
    <script>
        window.auth_user = {!! json_encode($auth_user); !!};
        window.auth_documents = {!! json_encode($auth_documents); !!};
        window.auth_code = {!! json_encode($auth_code); !!};
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    
</body>
</html>