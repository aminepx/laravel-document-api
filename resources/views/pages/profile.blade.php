@extends('layouts.app')

@section('content')
@foreach ($users as $user)
@if (Auth::user()->id==$user->id)
<div class="card mx-auto mt-5 " style="width: 18rem;">
    <img src="{{asset('images/'.$user->image)}}" class="card-img-top" height="" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$user->name}}</h5>
      <p class="card-text">{{$user->email}}</p>
      <a href="{{route('editProfile',['id'=>$user->id])}}" class="btn btn-warning ">Edit Profile</a>
    </div>
  </div>
@endif
@endforeach
@endsection