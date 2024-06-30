@extends('layout.base')

@section('content')
    @include('components.alerts')

    <h1>Edit Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="client_name" class="form-label">Name</label>
            <input type="text" name="client_name" class="form-control" id="client_name" value="{{ $client->client_name }}"
                required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" id="cpf" value="{{ $client->cpf }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $client->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Client</button>
    </form>
@endsection
