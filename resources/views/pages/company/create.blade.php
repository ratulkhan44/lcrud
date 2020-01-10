@extends('layout.master')
@section('content')
    @include('partials._navbar')
    <div class="container">
        <h1>Add Company</h1>
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
    <form class="text-center border border-light p-5" action="{{route('companies.store')}}" method="POST">
        @csrf
    <!-- Name -->
    <input type="text" id="name" class="form-control mb-4" name="name" placeholder="Comapny Name">

     <!-- Name -->
     <input type="text" name="owner" id="owner" class="form-control mb-4" placeholder="Owner">


    <!-- Sign in button -->
    <button class="btn btn-info my-4" type="submit">Submit</button>


</form>
    </div>
<!-- Default form login -->
@endsection