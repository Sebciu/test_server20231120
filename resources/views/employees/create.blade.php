
@extends('layouts.app')

@section('content')

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h2>Dodaj nowego użytkownika</h2>
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">Imię:</label>
                <input type="text" name="first_name" required class="form-control" @error('first_name') is-invalid @enderror value="{{ old('first_name') }}">
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Nazwisko:</label>
                <input type="text" name="last_name" required class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" required class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @if (count(old('phone_numbers', [])) == 0)
            <div class="form-group" id="phoneNumbersContainer">
                <label for="phone_numbers[]">Numer telefonu</label>
                <div class="input-group">
                    <input type="text" name="phone_numbers[]" required class="form-control" value="{{ old('phone_numbers.0') }}">
                    <button type="button" class="btn btn-success" onclick="addPhoneNumberField()">Dodaj kolejny numer</button>
                </div>
            </div>
            @else

            <div class="form-group" id="phoneNumbersContainer">
                <label for="phone_numbers[]">Numer telefonu</label>
                @foreach(old('phone_numbers', []) as $index => $phoneNumber)
                    <div class="input-group mt-2">
                        <input type="text" name="phone_numbers[]" required class="form-control" value="{{ $phoneNumber }}">
                        <button type="button" class="btn btn-danger" onclick="removePhoneNumberField(this)">Usuń</button>
                    </div>
                @endforeach
                <div class="input-group mt-2">
                    <button type="button" class="btn btn-success" onclick="addPhoneNumberField()">Dodaj kolejny numer</button>
                </div>
            </div>
            @endif

            <div class="form-group">
                <label for="company_id">Firma:</label>
                <select name="company_id" required class="form-select @error('company_id') is-invalid @enderror">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" @if(old('company_id') == $company->id) selected @endif>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dietary_preference_id">Preferencje żywieniowe:</label>
                <select name="dietary_preference_id" required class="form-select @error('dietary_preference_id') is-invalid @enderror">
                    @foreach($dietaryPreferences as $dietaryPreference)
                        <option value="{{ $dietaryPreference->id }}" @if(old('dietary_preference_id') == $company->id) selected @endif>{{ $dietaryPreference->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj pracownika</button>
        </form>
    </div>

    @push('scripts') @endpush
@endsection

