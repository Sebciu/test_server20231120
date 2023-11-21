<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\DietaryPreference;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $order = $request->input('order', 'asc');
        $search = $request->input('search', '');
        $selectedCompany = $request->input('company', '');

        $query = Employee::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }
        if ($selectedCompany) {
            $query->where('company_id', $selectedCompany);
        }

        $sortColumn = $request->input('sort', 'first_name');

        if ($sortColumn == 'company_name') {
            $query->join('companies', 'employees.company_id', '=', 'companies.id');
            $sortColumn = 'companies.name';
        }

        $query->orderBy($sortColumn, $order);

        $employees = $query->paginate($perPage);
        $companies = Company::all();


        return view('employees.index', compact('employees', 'perPage', 'order', 'search', 'sortColumn','selectedCompany','companies'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();
        $dietaryPreferences = DietaryPreference::all();

        return view('employees.edit', compact('employee', 'companies', 'dietaryPreferences'));
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employees.show', compact('employee'));
    }
    public function create()
    {
        $companies = Company::all();
        $dietaryPreferences = DietaryPreference::all();
        return view('employees.create', compact('companies', 'dietaryPreferences'));
    }
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validated();

        $validatedData['phone_numbers'] = json_encode($validatedData['phone_numbers']);

        $employee->update($validatedData);

        return redirect()->route('employees.show', $employee->id)->with('success', 'Pracownik zaktualizowany pomyślnie!');
    }


    public function store(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['phone_numbers'] = json_encode($request->input('phone_numbers'));
        $employee = Employee::create($validatedData);
        return redirect()->route('employees.create')->with('success', 'Użytkownik dodany pomyślnie!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Pracownik numer '.$id.' usunięty pomyślnie!');
    }
}
