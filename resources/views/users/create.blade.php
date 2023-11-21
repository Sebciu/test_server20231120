
@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h2>Dodaj nowego użytkownika</h2>
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Imię:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Dodaj użytkownika</button>
        </form>
    </div>
@endsection
