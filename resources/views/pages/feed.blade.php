@extends('layouts.app')

@section('content')


  @foreach ($documents as $doc)
  <table class="table w-75 mt-5 m-auto">
   
    <thead>
      <tr>
        <th style="" scope="col">ID</th>
        <th style="" scope="col">Title</th>
        <th style="" scope="col">subtitle</th>
        <th style="" scope="col">summary</th>
        <th style="" scope="col">keywords</th>
        <th style="" scope="col">Pdf</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <tr >
      
        <th scope="row">{{$doc->id}}</th>
        <td style="">{{$doc->title}}</td>
        <td style="">{{$doc->subtitle}}</td>
        <td style="">{{$doc->summary}}</td>
        <td style="">{{$doc->keywords}}</td>
        <td><a href="{{url('/download',$doc->pdf)}}">{{$doc->pdf}}</a></td>
       
        
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