<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
<h1>Register Now</h1>
           <div class="row">
            <form action="{{route('auth.register')}}" method="post">
                @csrf
                <input type="text" name="name" placeholder="Enter Name" class="form-control mt-4" value="{{old('name')}}"> 
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="text" name="mail" placeholder="Enter Mail" class="form-control mt-4" value="{{old('mail')}}">
                 @error('mail')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="text" name="password" placeholder="Enter Password" class="form-control mt-4" value="{{old('password')}}">
                 @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            <button class="btn btn-info mt-4">Register</button>
            </form>
           </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
    
</body>
</html>

