 @extends('layouts.app')

@section('content')


<div class="container">
    <h1 class="title">Vendor List</h1>
   
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white " href="/vendor/create">Create Vendor</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Name</th>						
          <th>Address</th>
          <th>Country</th>
          <th>City</th>
          <th>Zipcode</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Created Date</th>
        </tr>
      </thead>
      <tbody>
          @foreach($vendors as $vendor)
        <tr>
          <td>{{$vendor->name}}</td>
          <td>{{$vendor->address}}</td>
          <td>{{$vendor->country}}</td>
          <td>{{$vendor->city}}</td>
          <td>{{$vendor->zipcode}}</td>
          <td>{{$vendor->email}}</td>
          <td>{{$vendor->phone}}</td>
          <td>{{$vendor->created_at}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
