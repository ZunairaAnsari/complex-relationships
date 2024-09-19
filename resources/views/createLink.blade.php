@extends('layout')

@section('title')
    Link Client to Product
@endsection

@section('content')
  <h1 class="text-center mt-4">Link Client to Product</h1>

  @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form action="{{ route('records.store') }}" method="POST" class="container">
      @csrf

      <div class="mb-3">
          <label for="client_id" class="form-label">Select Client</label>
          <select name="client_id" id="client_id" class="form-control" required>
              @foreach ($clients as $client)
                  <option value="{{ $client->id }}">{{ $client->name }}</option>
              @endforeach
          </select>
      </div>

      <div class="mb-3">
          <label for="product_id" class="form-label">Select Product</label>
          <select name="product_id" id="product_id" class="form-control" required>
              @foreach ($products as $product)
                  <option value="{{ $product->id }}">{{ $product->product_name }}</option>
              @endforeach
          </select>
      </div>

      <div class="mb-3">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="number" class="form-control" id="quantity" name="quantity" required>
      </div>

      <button type="submit" class="btn btn-primary">Link Client to Product</button>
  </form>
@endsection
