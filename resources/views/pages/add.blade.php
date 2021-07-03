@extends('layouts.app')

@section('content')

<form action="{{route('save')}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    
    <div class="mt-5">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="title"  placeholder="Title">
            <label for="floatingInput">Title</label>
          </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="subtitle"  placeholder="Subtitle">
            <label for="floatingInput">Subtitle</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="summary"  placeholder="Summary">
            <label for="floatingInput">Summary</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="keywords"  placeholder="Keywords">
            <label for="floatingInput">Keywords</label>
          </div>
        <button class="btn  btn-success form-control mt-2 "> Add</button>
    </div>
   </div>
</form>

@endsection