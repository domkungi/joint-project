
@extends('layouts.app')
@section('content')

    <h1 class="title">Create Vendor</h1>

    <form action="/vendor/store" method="post">
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
                <td>Country</td>
                <td><input type="text" name="country"></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <td>Zipcode</td>
                <td><input type="text" name="zipcode"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone"></td>
            </tr>
        </table>

        <input  class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg"type="submit" value="Create">
    </form>
    @endsection
