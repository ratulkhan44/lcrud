@extends('layout.master')
@section('content')
    @include('partials._navbar')
    <div class="container">
        <h1>Company Details</h1>
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
        @endif
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$company->name}}</li>
              <li class="list-group-item">{{$company->owner}}</li>
            </ul>
          </div>
    </div>
<!-- Default form login -->
@endsection