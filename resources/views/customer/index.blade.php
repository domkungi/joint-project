@extends('layouts.app2')


@section('content')

<div class="container">
    <h1 class="title">Customer list</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-700 focus:bg-white "  href="/customer/create">Create Customer</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Company</th>
          <th>Address</th>
          <th>Zipcode</th>
          <th>City</th>
          <th>Country</th>
          <th>Phone</th>
          <th>E-mail</th>
          <th>Type</th>
          <th>Payment</th>
        </tr>
      </thead>
      <tbody>
          @foreach($customers as $customer)
        <tr>
          <td>{{$customer->name}}</td>
          <td>{{$customer->company_name}}</td>
          <td>{{$customer->address}}</td>
          <td>{{$customer->zipcode}}</td>
          <td>{{$customer->city}}</td>
          <td>{{$customer->country}}</td>
          <td>{{$customer->phone}}</td>
          <td>{{$customer->email}}</td>
          <td>{{$customer->type}}</td>
          <td>${{number_format($customer->payment,2)}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection