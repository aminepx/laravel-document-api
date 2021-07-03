@extends('layouts.app')

@section('content')
  @foreach ($documents as $doc)
  <table class="table w-75 mt-5 m-auto">
    
    <thead>
      <tr>
        <th style="width: 200px" scope="col">ID</th>
        <th style="width: 200px" scope="col">Title</th>
        <th style="width: 200px" scope="col">subtitle</th>
        <th style="width: 200px" scope="col">summary</th>
        <th style="width: 200px" scope="col">keywords</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <tr >
      
        <th scope="row">{{$doc->id}}</th>
        <td style="width: 250px">{{$doc->title}}</td>
        <td style="width: 250px">{{$doc->subtitle}}</td>
        <td style="width: 250px">{{$doc->summary}}</td>
        <td style="width: 250px">{{$doc->keywords}}</td>
        
             @if (Auth::user()->id == $doc->user_id)
             <td class="d-flex">
             <form action="{{route('delete',['id'=>$doc->id])}}"  method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger me-1">Delete</button>
              </form>
          <a href="{{route('update',['id'=>$doc->id])}}" class="profile__button u-fat-text"><button class="btn btn-warning me-1">Update</button></a></td>
            </td> 
             @endif 
             

      </td>
      
    </tr>
     
    </tbody>
    
  </table>
      @endforeach
  
  

@endsection