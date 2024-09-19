@extends('layout')

@section('title')
    Clients page
@endsection

@section('content')
  <h1 class="text-center mt-4">Clients Registration</h1>

<form action="{{ route('clients.store') }}" method="POST" class="container">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
       
      </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection