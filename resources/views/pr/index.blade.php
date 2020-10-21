 @extends('layouts.app')

 @section('content')
 
  <div class="container">
    <h1 class="title">Purchase Requisition List</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/pr/create">Create Purchase Requisition</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Purchase Requisition No.</th>
          <th>employee</th>
          <th>Created</th>
          <th>Document</th>
        </tr>
      </thead>
      <tbody>
       
        @foreach($prs as $pr)
        
        <tr>
          <td>PR#00{{$pr->id}}</td>
          <td>{{$pr->employee->name}}</td>
          <td>{{$pr->created_at}}</td>
          <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/pr/{{$pr->id}}">view</a></td>
        </tr>
        @endforeach
        
       </tbody>
    </table>
  </div>

  @endsection
