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
    @if (session('success'))

     <div class="alert alert-success" role="alert">
 {{session('success')}}
</div>


@endif

<h1>All Student Record</h1>
<form action="/search" method="get">
    <input type="text" placeholder="Searching ....." name="search">
    <button>Search</button>
</form>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Mail</th>
                        <th>Password</th>
                        <th>Gander</th>
                        <th>Number</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
@foreach ($data1 as $user )
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->mail}}</td>
        <td>{{$user->password}}</td>
        <td>{{$user->number}}</td>
        <td>{{$user->gander}}</td>
        <td>{{$user->role}}</td>
        <td>
            <a href="{{'stddelete/'.$user->id}}">Delete</a>
            <a href="{{'Editstd/'.$user->id}}">Edit</a>
        </td>
    </tr>
@endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
  
</body>
</html>