@extends('layouts.app')
@section('content')
<div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Company and Employee Details</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Add New</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Logo</th>
            <th>Company Name</th>
            <th>Company's Email</th>
            <th>Employee's First Name</th>
            <th>Employee's Last Name</th>
            <th>Employee's Email</th>
            <th>Employee's Phone</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $i1++ }}</td>
            
            <td><img src="image/{{ $employee->logo }}" height="75" width="75" alt="" /></td>
            <td>{{ $employee->company_name }}</td>
            <td>{{ $employee->company_email }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->employee_email }}</td>
            <td>{{ $employee->phone }}</td>
            <td>
                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $employees->links() !!}
    @endsection