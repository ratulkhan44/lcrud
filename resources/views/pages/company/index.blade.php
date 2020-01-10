@extends('layout.master')
@section('content')
    @include('partials._navbar')
    <div class="container">
        <h1>All Company</h1>
        @if(session('successMsg'))
        <div class="alert alert-success" role="alert">
            {{session('successMsg')}}
          </div>
        @endif  
        <table class="table">
            <thead class="black white-text">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Name</th>
                <th scope="col">Owner</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($companies as $key=>$company)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->owner}}</td>
                        <td>
                            <a href="{{route('companies.show',$company->id)}}" class="btn btn-primary">Details</a> 
                        <a href="{{route('companies.edit',$company->id)}}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{route('companies.destroy',$company->id)}}" id="delete-form-{{$company->id}}" style="display:none">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button onclick="if(confirm('Are YOu Sure Want to Delete?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{$company->id}}').submit();
                        }else{
                            event.preventDefault();
                        }" href="{{route('companies.destroy',$company->id)}}" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach  
            </tbody>
          </table>

          <div class="row">
            <div class="col-12 text-center">
                {{$companies->links()}}
            </div>
          </div>
          
    </div>
@endsection