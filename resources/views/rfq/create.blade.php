
    @extends('layouts.app')
    @section('content')
    
    <h1 class="title">Create RFQ</h1>

    <form action="/rfq/store/{{$pr->id}}" method="post">
        @csrf
        <table class="create-vd">
            <tr>
                <td>
                
                    <select class="text-black" name="employee_id">
                        @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                    </select>
                </td>

            </tr>
            <tr>
                <td>
                    <select class="text-black" name="vendor_id">
                        @foreach($vendors as $vendor)
                        <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                        @endforeach
                </td>

                </select>
            </tr>


        </table>

        <input class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg" type="submit" value="Create">
    </form>
    @endsection
