@extends('User.sidebar')

@section('web')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3>Fatch All My Appoiments</h3>
<table class="table">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Mail</th>
        <th>Age</th>
        <th>Address</th>
        <th>Hospital</th>
        <th>Doctor</th>
        <th>Date</th>
    </tr>

    @foreach ($fatch as $fatch)
        <tr>
            <td>{{$fatch->id}}</td>
            <td>{{$fatch->p_name}}</td>
            <td>{{$fatch->p_mail}}</td>
            <td>{{$fatch->p_age}}</td>
            <td>{{$fatch->p_address}}</td>
            <td>{{$fatch->hospital->name}}</td>
            <td>{{$fatch->doctor->name}}</td>
            <td>{{$fatch->date}}</td>
        </tr>
    @endforeach
</table>
            </div>
        </div>
    </div>
@endsection