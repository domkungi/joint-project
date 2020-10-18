
@extends('layouts.app')

@push('styles')

@endpush


@section('content')
<body>

    <h1 class="title">Create Product</h1>

    <form action="/employee/store" method="post">
        @csrf
        <table class="create-vd">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
        </table>

        <input class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg" type="submit" value="Create">
    </form>
    
</body>
@endsection

@push('scripts')

@endpush




