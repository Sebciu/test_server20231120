@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edytuj Pracownika</h2>

        <div class="card">
            <div class="card-header">
                Edytuj Pracownika
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="first_name">Imię:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $employee->first_name) }}">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">Nazwisko:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $employee->last_name) }}">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $employee->email) }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="company_id">Firma:</label>
                        <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror">
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id) == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('company_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dietary_preference_id">Preferencje żywieniowe:</label>
                        <select name="dietary_preference_id" id="dietary_preference_id" class="form-control @error('dietary_preference_id') is-invalid @enderror">
                            <option value="" {{ old('dietary_preference_id', $employee->dietary_preference_id) == '' ? 'selected' : '' }}>Brak preferencji</option>
                            @foreach($dietaryPreferences as $dietaryPreference)
                                <option value="{{ $dietaryPreference->id }}" {{ old('dietary_preference_id', $employee->dietary_preference_id) == $dietaryPreference->id ? 'selected' : '' }}>
                                    {{ $dietaryPreference->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('dietary_preference_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group" id="phoneNumbersContainer">
                        <label for="phone_numbers[]">Numer telefonu:</label>
                        @foreach(json_decode($employee->phone_numbers, true) as $index => $phoneNumber)
                            <div class="input-group mt-2">
                                <input type="text" name="phone_numbers[]" class="form-control @error("phone_numbers.$index") is-invalid @enderror" value="{{ old("phone_numbers.$index", $phoneNumber) }}">
                                <button type="button" class="btn btn-danger" onclick="removePhoneNumberField(this)">Usuń</button>
                                @error("phone_numbers.$index")
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @endforeach
                        <div class="input-group mt-2">
                            <button type="button" class="btn btn-success" onclick="addPhoneNumberField()">Dodaj kolejny numer</button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Powrót do Listy</a>
            </div>
        </div>
    </div>
    @push('scripts') @endpush
@endsection
