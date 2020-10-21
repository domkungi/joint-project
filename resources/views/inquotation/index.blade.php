 @extends('layouts.app')
 
 @section('content')
 <div class="container">
    <h1 class="title">Inbound Quotation List</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/rfq">Create Inbound Quotation</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Inbound Quotation No.</th>
          <th>Vendor</th>
          <th>Created</th>
          <th>Document</th>
        </tr>
      </thead>
      <tbody>
        @foreach($inquotations as $inquotation)
        <tr>
          <td>IQ#00{{$inquotation->id}}</td>
          <td>{{$inquotation->vendor->name}}</td>
          <td>{{$inquotation->created_at}}</td>
          <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/inquotation/{{$inquotation->id}}">view</a></td>
        </tr>
        @endforeach
        
       </tbody>
    </table>
  </div>
 @endsection

 
 

