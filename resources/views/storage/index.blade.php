@extends('layouts.app')

@section('content')


<div class="container">
    <h1 class="title">Storage Location</h1>

    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white " href="/vendor/create">Create Vendor</a> </h3>
    <table class="table-table-bordered">
        <thead>
            <tr>
                <th>Storage ID</th>
                <th>Company ID</th>
                <th>Country</th>
                
                <th>Details</th>

            </tr>
        </thead>
        <tbody>
            @foreach($storages as $storage)
            <tr>
                <td>ST#00{{$storage->id}}</td>
                <td>CP#00{{$storage->company_id}}</td>
                <td>{{$storage->country}}</td>
                
                <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/stock/{{$storage->id}}">view</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection