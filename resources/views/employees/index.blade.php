@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h2>Lista Pracowników</h2>

        <form method="get" action="{{ route('employees.index') }}">
            <div class="form-group col-md-3">
                <label for="company">Firma:</label>
                <select name="company" id="company" class="form-control" onchange="this.form.submit()">
                    <option value="" {{ $selectedCompany == '' ? 'selected' : '' }}>Wszystkie firmy</option>
                    @foreach($companies as $companyOption)
                        <option value="{{ $companyOption->id }}" {{ $selectedCompany == $companyOption->id ? 'selected' : '' }}>
                            {{ $companyOption->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="search">Wyszukaj:</label>
                    <input type="text" name="search" id="search" class="form-control" value="{{ $search }}" placeholder="Imię, Nazwisko, Email">
                </div>
                <div class="form-group col-md-3">
                    <label for="perPage">Liczba pracowników na stronie:</label>
                    <select name="perPage" id="perPage" class="form-control" onchange="this.form.submit()">
                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="order">Sortuj:</label>
                    <select name="order" id="order" class="form-control" onchange="this.form.submit()">
                        <option value="asc" {{ $order == 'asc' ? 'selected' : '' }}>Rosnąco</option>
                        <option value="desc" {{ $order == 'desc' ? 'selected' : '' }}>Malejąco</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="submitBtn" class="invisible">Filtruj</label>
                    <button type="submit" id="submitBtn" class="btn btn-primary btn-block">Filtruj</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th>
                    <a href="{{ route('employees.index', ['sort' => 'first_name', 'order' => $order === 'asc' ? 'desc' : 'asc']) }}">
                        Imię
                        @if ($sortColumn === 'first_name')
                            @if ($order === 'asc')
                                <i class="fa fa-caret-up"></i>
                            @else
                                <i class="fa fa-caret-down"></i>
                            @endif
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('employees.index', ['sort' => 'last_name', 'order' => $order === 'asc' ? 'desc' : 'asc']) }}">
                        Nazwisko
                        @if ($sortColumn === 'last_name')
                            @if ($order === 'asc')
                                <i class="fa fa-caret-up"></i>
                            @else
                                <i class="fa fa-caret-down"></i>
                            @endif
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('employees.index', ['sort' => 'email', 'order' => $order === 'asc' ? 'desc' : 'asc']) }}">
                        Email
                        @if ($sortColumn === 'email')
                            @if ($order === 'asc')
                                <i class="fa fa-caret-up"></i>
                            @else
                                <i class="fa fa-caret-down"></i>
                            @endif
                        @endif
                    </a>
                </th>
                <th>Numery telefonów:</th>
                <th>
                    <a href="{{ route('employees.index', ['sort' => 'company_name', 'order' => $order === 'asc' ? 'desc' : 'asc']) }}">
                        Firma
                        @if ($sortColumn === 'company_name')
                            @if ($order === 'asc')
                                <i class="fa fa-caret-up"></i>
                            @else
                                <i class="fa fa-caret-down"></i>
                            @endif
                        @endif
                    </a>
                </th>
                <th>Preferencje żywieniowe</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        @foreach(json_decode($employee->phone_numbers) as $phoneNumber)
                            {{ $phoneNumber }},
                        @endforeach
                    </td>
                    <td>{{ $employee->company->name }}</td>
                    <td>
                        @if ($employee->dietaryPreference)
                            {{ $employee->dietaryPreference->name }}
                        @else
                            Brak preferencji
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">Pokaż</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            {{ $employees->links('pagination::simple-bootstrap-4') }}
        </nav>
    </div>
    @push('scripts') @endpush
@endsection
