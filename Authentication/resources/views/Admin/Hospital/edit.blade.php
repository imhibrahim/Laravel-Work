@extends('Admin.sidebar')


@section('dashboard')
  
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 text-center">
            <h1>Edit Hospital</h1>
            <form action="{{route('updatehospital',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mt-4">
                        <input type="text" placeholder="Enter Name" class="form-control" name="hospitalname" value="{{$data->name}}">
                        @error('hospitalname')
                           <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </div>

<div class="col-md-6 mt-4">
                        <input type="text" placeholder="Enter Location" class="form-control" name="hospitaladdress" value="{{$data->location}}">
                         @error('hospitaladdress')
                           <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </div>

                    <div class="col-md-6 mt-4">
                        <input type="file" placeholder="Enter Name" class="form-control" name="pic">
                        <img src="{{url('storage/hospitals/'.$data->image)}}" width="70px" alt="No image Found">
                         @error('pic')
                           <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </div>

                    <div class="col-md-6 mt-4">
                        <textarea name="desc" class="form-control" placeholder="Description">{{$data->description}}</textarea>
                         @error('desc')
                           <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </div>

                </div>
                <button class="btn btn-info mt-5">Insert</button>
            </form>
        </div>
    </div>
</div>

@endsection