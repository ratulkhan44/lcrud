@extends('layout.master')
@section('content')
    @include('partials._navbar')
    <div class="container">
        <h1>Add Customer</h1>
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
        @endif
    <!-- Default form login -->
    <form class="text-center border border-light p-5" action="{{route('customers.store')}}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
        @csrf
    <!-- Name -->
      
      <div class="md-form input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text md-addon" id="name">Name</span>
        </div>
        <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="name">
      </div>

      <div class="md-form input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text md-addon" id="email">Email</span>
        </div>
        <input type="email" class="form-control"  name="email" aria-label="Sizing example input" aria-describedby="email">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="company_id">Company</label>
        </div>
        <select class="browser-default custom-select" id="company_id" name="company_id">
          <option selected>Choose...</option>
          @foreach ($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
          @endforeach
        </select>
      </div>
      
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="status">Status</label>
        </div>
        <select class="browser-default custom-select" id="status" name="status">
          <option selected>Choose...</option>
          <option value="0">Inactive</option>
          <option value="1">Active</option>
        </select>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="image">Upload Image</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01" name="image">
          <label class="custom-file-label" for="image">Choose file</label>
        </div>
      </div>

      <button class="btn btn-info my-4" type="submit">Submit</button>

</form>
    </div>
<!-- Default form login -->
@endsection