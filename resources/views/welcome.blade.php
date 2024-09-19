@extends('layout')

@section('title')
    Clients List
@endsection

@section('content')
  <h1 class="text-center mt-4">Clients List</h1>

  @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if ($clients->isEmpty())
      <p>No clients registered yet.</p>
  @else
    <div class="container">
       <table class=" table table-striped">
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>

        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;">
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
    <a href="{{ route('clients.create') }}" class="btn btn-success mt-3">Add New Client</a>
</div>

@endsection
