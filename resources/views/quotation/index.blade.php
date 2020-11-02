@extends('layouts.app2')


@section('content')

<div class="container">
    <h1 class="title">Quotation History</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-700 focus:bg-white "  href="/inquiry">Create Quotation</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Quotation ID</th>
          <th>Customer</th>
          <th>Company</th>
          <th>Employee</th>
          <th>Create</th>
          <th>Document</th>
        </tr>
      </thead>
      <tbody>
          @foreach($quotations as $quotation)
        <tr>
          <td>QT#00{{$quotation->id}}</td>
          <td>{{$quotation->customer->name}}</td>
          <td>{{$quotation->customer->company_name}}</td>
          <td>{{$quotation->employee->name}}</td>
          <td>{{$quotation->created_at}}</td>
          <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-800 focus:bg-white" href="/quotation/{{$quotation->id}}">view</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection