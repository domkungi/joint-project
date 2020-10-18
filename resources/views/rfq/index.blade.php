@extends('layouts.app')
  @section('content')
  
  <div class="container">
    <h1 class="title">Request For Quotation</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/pr">Create Request For Quotation</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Request For Quotation No.</th>
          <th>Vendor</th>
          <th>Employee</th>
          <th>Created</th>
          <th>Document</th>
        </tr>
      </thead>
      <tbody>
       
        @foreach($rfqs as $rfq)
        
        <tr>
          <td>RFQ#00{{$rfq->id}}</td>
          <td>{{$rfq->vendor->name}}</td>
          <td>{{$rfq->employee->name}}</td>
          <td>{{$rfq->created_at}}</td>
          <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/rfq/{{$rfq->id}}">show</a></td>
        </tr>
        @endforeach
        
       </tbody>
    </table>
  </div>

  @endsection
