@extends('layouts.app')

@section('content')
    <div class="text-white px-8">
        <h1 class="title">Create Purchase Requisition</h1>

        <form action="/pr/store" method="post">
            @csrf
            <table class="create-vd">
                <tr>
                    <select class="text-black" name="employee_id">
                        @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                    </select>
                </tr>


            </table>
            <table>

                @foreach($products as $product)
                <div class="mt-2 ">
                    <input type="checkbox" value="{{$product->id}}" name="items[{{$loop->index}}][product_ids]">{{$product->name}}
                    <input class="text-black focus:bg-gray-300" type="text" name="items[{{$loop->index}}][qty]"> qty
                </div>
                @endforeach
            </table>
            <input class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg" type="submit" value="Create">
        </form>
    </div>
@endsection

    
   

