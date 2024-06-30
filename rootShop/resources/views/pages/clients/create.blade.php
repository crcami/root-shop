@extends('layout.base')

@section('content')
    <h1>Add Client</h1>

    @include('components.alerts')

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="client_name" class="form-label">Name</label>
            <input type="text" name="client_name" class="form-control" id="client_name" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" id="cpf" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <button type="submit" class="btn btn-primary">Add Client</button>
    </form>
@endsection
