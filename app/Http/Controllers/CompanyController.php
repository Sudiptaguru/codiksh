<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $data['employees'] = Company::orderBy('id','desc')->paginate(2);
        $data['employees'] = DB::table('employees')
        ->join('companies','employees.id','=','companies.id')
        ->select('companies.*','employees.*')

        // ->select('employee.name','members.name')
        // ->get();
        ->paginate(10);
        // return $data;
        $i=1;
    
        return view('employees.index', ['i1'=>$i], $data);
    }
    public function create()
    {
        return view('employees.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'employee_email' => 'required|email|max:255|unique:employees',
            'phone' => 'required',
            'company_name' => 'required',
            'company_email' => 'required|email|max:255|unique:companies',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($logo = $request->file('logo')) {
            $path = $request->file('logo');
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $profileImage);
            $employee['logo'] = "$profileImage";
            $destination = $employee['logo'];
        }

    	$employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->employee_email = $request->employee_email;
        $employee->phone = $request->phone;
        $company = new Company();
        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;
        $company->logo = $destination;
        $company->website = $request->website;
        // $user->password = encrypt('secret');
        $company->save();
        $company->employee()->save($employee);
        return redirect()->route('employees.index')
                        ->with('success','Record has been created successfully.');
    }
    public function edit($id)
    {
        $data['employees'] = DB::table('employees')
        ->join('companies','employees.id','=','companies.id')
        ->select('companies.*','employees.*')
        // ->where('employee.name','Ram')
        ->where('employees.id',$id)
        // ->select('employee.name','members.name')
        ->get();
        // return $data;
        return view('employees.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'employee_email' => 'required|email|max:255|unique:employees',
            'phone' => 'required',
            'company_name' => 'required',
            'company_email' => 'required|email|max:255|unique:companies',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $company = Company::find($id);

        if ($logo = $request->file('logo')) {
            $path = $request->file('logo');
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $profileImage);
            $employee['logo'] = "$profileImage";
            $destination = $employee['logo'];
        }

        $employee = Employee::find($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->employee_email = $request->employee_email;
        $employee->phone = $request->phone;
        
        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;
        $company->logo = $destination;
        $company->website = $request->website;
        // $user->password = encrypt('secret');
        $company->save();
        $company->employee()->save($employee);
        return redirect()->route('employees.index')
                        ->with('success','Record has been created successfully.');
    }
    public function destroy($id)
    {
        $employee = Company::find($id);
        $employee->delete();
    
        return redirect()->route('employees.index')
                        ->with('success','Record has been deleted successfully');
    }
}
