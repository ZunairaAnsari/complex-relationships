@extends('layout')

@section('title')
    Clients page
@endsection

@section('content')
  <h1 class="text-center mt-4" style="font-family: Arial, Helvetica, sans-serif">Add Products</h1>

<form action="{{ route('products.store') }}" method="POST" class="container">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="product_name">
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Description</label>
        <input type="text" class="form-control" id="Description" aria-describedby="name" name="description">
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection