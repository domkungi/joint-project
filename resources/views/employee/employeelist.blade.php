
@extends('layouts.app')



@section('content')



<div class="container">
    <h1 class="title">Employee list</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white "  href="/employee/create">Create Employee</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>E-mail</th>
          <th>Created</th>
        </tr>
      </thead>
      <tbody>
          @foreach($employees as $employee)
        <tr>
          <td>{{$employee->name}}</td>
          <td>{{$employee->address}}</td>
          <td>{{$employee->phone}}</td>
          <td>{{$employee->email}}</td>
          <td>{{$employee->created_at}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection

