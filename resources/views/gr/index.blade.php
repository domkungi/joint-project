@extends('layouts.app')

 @section('content')
 
  <div class="container">
    <h1 class="title">Goods Receipt List</h1>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Purchase Order No.</th>
          
          <th>Storage Country</th>
          <th>Received Date</th>
          <th>Document</th>
          
        </tr>
      </thead>
      <tbody>
       
        @foreach($grs as $gr)
        <tr>
          <td>PO#00{{$gr->purchase_order_id}}</td>
          <td>{{$gr->storage->country}}</td>
          <td>{{$gr->created_at}}</td>
          <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/gr/{{$gr->id}}">view</a></td>
            
        </tr>
        @endforeach
        
       </tbody>
    </table>
  </div>

  @endsection