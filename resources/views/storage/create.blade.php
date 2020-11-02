
@extends('layouts.app')
@section('content')

    <h1 class="title">Create New Storage Location</h1>

    <form action="/storage/store" method="post">
        @csrf
        <table class="create-vd">
            <tr>
                <td>Country</td>
                <td><input type="text" name="country"></td>
            </tr>
        </table>
        <div class="py-5">
          <input class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg" type="submit" value="Create">  
        </div>
        
    </form>
    @endsection
