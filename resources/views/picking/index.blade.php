@extends('layouts.app2')


@section('content')

<div class="container">
    <h1 class="title">Picking list History</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-700 focus:bg-white "  href="/saleorder">Create Picking list</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Picking ID</th>
          <th>Employee</th>
          <th>Create</th>
          <th>Document</th>
        </tr>
      </thead>
      <tbody>
          @foreach($pickings as $picking)
        <tr>
          <td>PK#00{{$picking->id}}</td>
          <td>{{$picking->employee->name}}</td>
          <td>{{$picking->created_at}}</td>
          <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-800 focus:bg-white" href="/picking/{{$picking->id}}">view</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection