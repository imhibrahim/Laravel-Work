
@extends('Admin.sidebar')

@section('dashboard')
@if (session('success'))
    <p style="background-color: green; color:aquamarine">{{session('success')}}</p>
@endif

@if (session('error'))
    <p style="background-color: red; color:orange">{{session('error')}}</p>
@endif

    <h1>All Doctors</h1>
<div class="conatiner">
    <div class="row">
        <div class="col-md-8 offset-2">
            <table class="table">
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Spc</th>
    <th>Description</th>
    <th>Hospital</th>
    <th>Action</th>

</tr>


@foreach ($doctor as $alldoc)
    <tr>
        <td>{{$alldoc->id}}</td>
        <td>{{$alldoc->name}}</td>
        <td>{{$alldoc->spc}}</td>
        <td>{{$alldoc->desc}}</td>
        <td>{{$alldoc->hospital->name}}</td>
       
        <td>
           
        </td>
    </tr>
@endforeach


</table>
        </div>
    </div>
</div>

@endsection