@extends('layouts.app2')


@section('content')

<div class="container">
    <h1 class="title">Invoice History</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-700 focus:bg-white "  href="/picking">Create Invoice</a> </h3>
     <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Invoice ID</th>
          <th>Employee</th>
          <th>Customer</th>
          <th>Company</th>
          <th>Create</th>
          <th>Document</th>
        </tr>
      </thead>
      <tbody>
          @foreach($invoices as $invoice)
        <tr>
          <td>IV#00{{$invoice->id}}</td>
          <td>{{$invoice->employee->name}}</td>
          <td>{{$invoice->customer->name}}</td>
          <td>{{$invoice->customer->company_name}}</td>
          <td>{{$invoice->created_at}}</td>
          <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-800 focus:bg-white" href="/invoice/{{$invoice->id}}">view</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection