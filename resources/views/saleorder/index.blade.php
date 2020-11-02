@extends('layouts.app2')


@section('content')

<div class="container">
    <h1 class="title">Sale Order History</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-700 focus:bg-white "  href="/quotation">Create Sale Order</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Sale Order ID</th>
          <th>Customer</th>
          <th>Company</th>
          <th>Employee</th>
          <th>Create</th>
          <th>Document</th>
        </tr>
      </thead>
      <tbody>
          @foreach($saleorders as $saleorder)
        <tr>
          <td>SO#00{{$saleorder->id}}</td>
          <td>{{$saleorder->customer->name}}</td>
          <td>{{$saleorder->customer->company_name}}</td>
          <td>{{$saleorder->employee->name}}</td>
          <td>{{$saleorder->created_at}}</td>
          <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-800 focus:bg-white" href="/saleorder/{{$saleorder->id}}">view</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection