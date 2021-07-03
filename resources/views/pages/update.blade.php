@extends('layouts.app')

@section('content')

<form action="{{route('edited',['id'=>$doc->id])}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    <h1 class="text-center m-4 text-secondary">Update Document: {{$doc->id}}</h1>
    <div class="mt-5">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="title" value="{{$doc->title}}"   placeholder="Name">
            <label for="floatingInput">Title</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="subtitle" value="{{$doc->subtitle}}"   placeholder="page type">
            <label for="floatingInput">Subtitle</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="summary" value="{{$doc->summary}}"   placeholder="Summary">
            <label for="floatingInput">Summary</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="keywords"  value="{{$doc->keywords}}" placeholder="Keywords">
            <label for="floatingInput">Keywords</label>
          </div>
        
        <button class="btn  btn-warning form-control "> Update</button>
    </div>
   </div>
</form>

@endsection