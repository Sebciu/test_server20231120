@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h2>Szczegóły Pracownika</h2>

        <div class="card">
            <div class="card-header">
                Szczegóły Pracownika
            </div>
            <div class="card-body">
                <p><strong>Imię:</strong> {{ $employee->first_name }}</p>
                <p><strong>Nazwisko:</strong> {{ $employee->last_name }}</p>
                <p><strong>Email:</strong> {{ $employee->email }}</p>
                <p><strong>Firma:</strong> {{ $employee->company->name }}</p>
                <p><strong>Preferencje żywieniowe:</strong>
                    @if ($employee->dietaryPreference)
                        {{ $employee->dietaryPreference->name }}
                    @else
                        Brak preferencji
                    @endif
                </p>
                <p><strong>Telefony:</strong>
                    @foreach(json_decode($employee->phone_numbers, true) as $phoneNumber)
                        {{ $phoneNumber }},
                    @endforeach
                </p>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edytuj</a>

                <form method="POST" action="{{ route('employees.destroy', $employee->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tego pracownika?')">Usuń</button>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Powrót do Listy</a>
            </div>
        </div>
    </div>
    @push('scripts') @endpush
@endsection
