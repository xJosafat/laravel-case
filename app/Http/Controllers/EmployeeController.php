<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $employees = Employee::select("*")->orderBy('last_name','asc')->paginate(10);

        return view('employees.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Display a CRUD listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function admin()
    {
        $employees = Employee::select("*")->orderBy('last_name','asc')->paginate(10);

        return view('employees.admin', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateForm($request);
        $input = $request->all();
        Employee::create($input);
        $request->session()->flash('message', 'Employee created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  string $employee
     * @return Application|Factory|View
     */
    public function show(string $employee)
    {
        $employee = Employee::where('id',$employee)->get()[0];
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param String $employee
     * @return Application|Factory|View
     */
    public function edit(String $employee)
    {
        $employee = Employee::where('id',$employee)->get()[0];
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param String $employee
     * @return RedirectResponse
     */
    public function update(Request $request, String $employee): RedirectResponse
    {
        $this->validateForm($request);
        $employee = Employee::findOrFail($employee);
        $input = $request->all();
        $employee->fill($input)->save();
        $request->session()->flash('message', 'Employee updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $employee
     * @return Application|Factory|View
     */
    public function destroy(string $employee)
    {
        Employee::where('id',$employee)->delete();
        return view('employees.delete', compact('employee'));
    }

    /**
     * @param Request $request
     * @return array
     */
    private function validateForm(Request $request) {
        return $request->validate([
            'name_prefix' => ['required', 'max:255', 'string'],
            'first_name' => ['required', 'max:255', 'string'],
            'middle_initial' => ['required', 'max:1', 'alpha'],
            'last_name' => ['required', 'max:255', 'string'],
            'gender' => ['required', 'max:1', 'alpha'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'father_name' => ['required', 'max:255', 'string'],
            'mother_name' => ['required', 'max:255', 'string'],
            'mother_maiden_name' => ['required', 'max:255', 'string'],
            'birth_date' => ['required', 'date'],
            'joining_date' => ['required', 'date'],
            'salary' => ['required', 'numeric'],
            'ssn' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'zip' => ['required', 'max:255', 'string'],
        ]);
    }
}
