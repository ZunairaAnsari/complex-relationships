@extends('layout')

@section('title')
    Clients List
@endsection

@section('content')
  <h1 class="text-center mt-4">Products List</h1>

  @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if ($products->isEmpty())
      <p>No products added yet.</p>
  @else
    <div class="container">
       <table class=" table table-striped">
        <th>Products</th>
        <th>Description</th>
        <th>Action</th>

        @foreach ($products as $p)
            <tr>
                <td>{{ $p->product_name }}</td>
                <td>{{ $p->description }}</td>
                <td>
                    <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
       </table>
    </div>    
  @endif
<div class="container">
    <a href="{{ route('products.create') }}" class="btn btn-success mt-3">Add New Product</a>
</div>

@endsection
