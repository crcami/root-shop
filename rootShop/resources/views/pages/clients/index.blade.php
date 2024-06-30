@extends('layout.base')

@section('content')
    @include('components.alerts')

    <h1>Clients</h1>

    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Add Client</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->client_name }}</td>
                    <td>{{ $client->cpf }}</td>
                    <td>{{ $client->email }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
