@extends('layout')

@section('title')
    Linked Records
@endsection

@section('content')
  <h1 class="text-center mt-4">Linked Clients and Products</h1>

  <table class="table">
      <thead>
          <tr>
              <th>Client Name</th>
              <th>Product Name</th>
              <th>Quantity</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($records as $record)
              <tr>
                  <td>{{ $record->client->name }}</td>
                  <td>{{ $record->product->product_name }}</td>
                  <td>{{ $record->quantity }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
@endsection
