
@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="title">Product list</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white " href="/product/create">Create Product</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Color</th>
          <th>Created</th>
        </tr>
      </thead>
      <tbody>
          @foreach($products as $product)
        <tr>
          <td>{{$product->name}}</td>
          <td>{{$product->color}}</td>
          <td>{{$product->created_at}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
