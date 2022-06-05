@extends('layouts.app')
@section('content')
<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Company and Employee Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
   
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
  
  @foreach ($employees as $employee)
    <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    <input type="text" name="company_name" value="{{ $employee->company_name }}" class="form-control" placeholder="Company Name">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Email:</strong>
                    <input type="text" name="company_email" value="{{ $employee->company_email }}" class="form-control" placeholder="Company Name">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Logo:</strong>
                    <input type="file" name="logo" class="form-control" placeholder="Logo">
                    <img src="../../image/{{ $employee->logo }}" width="300px">
                    @error('logo')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Website:</strong>
                    <input type="text" name="website" value="{{ $employee->website }}" class="form-control" placeholder="Company Name">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control" placeholder="Company Name">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control" placeholder="Company Name">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Employee Email:</strong>
                    <input type="text" name="employee_email" value="{{ $employee->employee_email }}" class="form-control" placeholder="Employee Email">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control" placeholder="Employee Phone">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Id:</strong>
                    <input type="text" name="company_id" value="{{ $employee->company_id }}" class="form-control" placeholder="Company Id">
                    
                </div>
            </div>
            

              <button type="submit" class="btn btn-primary ml-3">Submit</button>
          
        </div>
   
    </form>
    @endforeach
</div>
@endsection