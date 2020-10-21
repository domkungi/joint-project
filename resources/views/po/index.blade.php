@extends('layouts.app')

 @section('content')
 
  <div class="container">
    <h1 class="title">Purchase Order List</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/inquotation">Create Purchase Order</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Purchase Order No.</th>
          <th>vendor</th>
          <th>employee</th>
          <th>Created</th>
          <th>Document</th>
        </tr>
      </thead>
      <tbody>
       
        @foreach($pos as $po)
        
        <tr>
          <td>PO#00{{$po->id}}</td>
          <td>{{$po->vendor->name}}</td>
          <td>{{$po->employee->name}}</td>
          <td>{{$po->created_at}}</td>
          <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/po/{{$po->id}}">view</a></td>  
        </tr>
        @endforeach
        
       </tbody>
    </table>
  </div>

  @endsection