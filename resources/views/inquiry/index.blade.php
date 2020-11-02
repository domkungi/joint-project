@extends('layouts.app2')


@section('content')

<div class="container">
    <h1 class="title">Inquiry History</h1>
    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-700 focus:bg-white "  href="/inquiry/create">Create Inquiry</a> </h3>
    <table class="table-table-bordered">
      <thead>
        <tr>
          <th>Inquiry ID</th>
          <th>Customer</th>
          <th>Company</th>
          <th>Create</th>
          <th>Document</th>
        </tr>
      </thead>
      <tbody>
          @foreach($inquiries as $inquiry)
        <tr>
          <td>IQ#00{{$inquiry->id}}</td>
          <td>{{$inquiry->customer->name}}</td>
          <td>{{$inquiry->customer->company_name}}</td>
          <td>{{$inquiry->created_at}}</td>
          <td> <a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-800 focus:bg-white" href="/inquiry/{{$inquiry->id}}">view</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection