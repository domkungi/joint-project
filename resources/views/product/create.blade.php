
@extends('layouts.app')
@section('content')

    <h1 class="title">Create Product</h1>

    <form action="/product/store" method="post">
        @csrf
        <table class="create-vd">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Color</td>
                <td><input type="text" name="color"></td>
            </tr>
            <tr>
                <td>Sale_Price</td>
                <td><input type="text" name="sale_price"></td>
            </tr>
        </table>
        <div class="py-5">
          <input class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg" type="submit" value="Create">  
        </div>
        
    </form>
    @endsection
