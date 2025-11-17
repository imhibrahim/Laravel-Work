@extends('Admin.sidebar')

@section('dashboard')

@if(session('success'))
    <p style="color: green; background:lightgreen">{{session('success')}}</p>
@endif

    <h1>All Hospitals</h1>
<div class="conatiner">
    <div class="row">
        <div class="col-md-8 offset-2">
            <table class="table">
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Location</th>
    <th>Description</th>
    <th>Image</th>
    <th>Action</th>

</tr>


@foreach ($alldata as $hospital)
    <tr>
        <td>{{$hospital->id}}</td>
        <td>{{$hospital->name}}</td>
        <td>{{$hospital->location}}</td>
        <td>{{$hospital->description}}</td>
        <td><img src="{{url('storage/hospitals/'.$hospital->image)}}" width="80px"></td>
        <td>
            <a href="{{route('edithospital',$hospital->id)}}">edit</a> |
             <a href="{{route('deletehospital',$hospital->id)}}">Delete</a>
        </td>
    </tr>
@endforeach


</table>
        </div>
    </div>
</div>

@endsection