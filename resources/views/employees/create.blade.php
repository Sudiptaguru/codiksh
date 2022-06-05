@extends('layouts.app')
@section('content')
<div class="container mt-2">
  
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Add Company and Employee Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
        </div>
    </div>
</div>
   
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
   
<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" class="form-control" placeholder="First Name">
               @error('first_name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                @error('last_name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee's Email:</strong>
                 <input type="text" name="employee_email" class="form-control" placeholder="Employee's Email">
                @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                 <input type="number" name="phone" class="form-control" placeholder="Phone">
                <!-- @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror -->
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company's Name:</strong>
                 <input type="text" name="company_name" class="form-control" placeholder="Company's Name">
                @error('company_name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company's Email:</strong>
                 <input type="text" name="company_email" class="form-control" placeholder="Company's Email">
                @error('company_email')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company's Logo:</strong>
                 <input type="file" name="logo" class="form-control" placeholder="Company's Logo">
                @error('logo')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company's Website:</strong>
                 <input type="text" name="website" class="form-control" placeholder="Company's Website">
                <!-- @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror -->
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
   
</form>
@endsection