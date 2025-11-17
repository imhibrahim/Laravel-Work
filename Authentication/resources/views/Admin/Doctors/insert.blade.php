@extends('Admin.sidebar')


@section('dashboard')
  
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 text-center">
            <h1>Insert Doctor</h1>
            <form action="{{route('insert_doctor')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mt-4">
                        <input type="text" placeholder="Enter Name" class="form-control" name="name" >
                        @error('name')
                           <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </div>

<div class="col-md-6 mt-4">
                        <input type="text" placeholder="Enter Specialist" class="form-control" name="spc" >
                         @error('spc')
                           <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </div>

                    <div class="col-md-6 mt-4">
                      <select name="hospital" class="form-control">
                     @foreach ($hospital as $data )
                            <option value="{{$data->id}}">{{$data->name}}</option>
                     @endforeach
                      </select>
                    </div>

                    <div class="col-md-6 mt-4">
                        <textarea name="desc" class="form-control" placeholder="Description"></textarea>
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