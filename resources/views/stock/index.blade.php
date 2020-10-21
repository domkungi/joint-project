@extends('layouts.app')

@section('content')


<div class="container">
    <h1 class="title">Stock {{$storage->country}} List</h1>

    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white " href="/vendor/create">Create Vendor</a> </h3>
    <table class="table-table-bordered">
        <thead>
            <tr>
                <th>Stock ID</th>
                <th>Goods Receipt ID</th>
                <th>Product</th>
                <th>Inbound QTY</th>
                <th>Outbound QTY</th>
                <th>Date</th>

            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
            <tr>
                <td>S00{{$stock->id}}</td>
                <td>GR#00{{$storage->goods_receipt_id}}</td>
                <td>{{$stock->goodReceipt->purchaseOrder}}</td>
                
                <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/stock">view</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection