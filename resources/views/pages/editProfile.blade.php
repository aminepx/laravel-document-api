@extends('layouts.app')

@section('content')

<form action="{{route('updateProfile',['id'=>$user->id])}}" method="post" enctype="multipart/form-data" class="w-50 mx-auto mt-5">  
 
    @csrf
   
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="name" value="{{$user->name}}"   placeholder="name">
            <label for="floatingInput">Name</label>
          </div>
         
          <input type="file" class="form-control" name='image'>
        <button class="btn  btn-warning form-control "> Update</button>
    </div>
   </div>
</form>

@endsection