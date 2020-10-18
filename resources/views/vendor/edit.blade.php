<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body>
    <h1>Create Vendor</h1>

    <form action="/vendor/{{$vendor->id}}" method="post">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Name</td>
                <td><input value="{{$vendor->vendor_name}}" type="text" name="name"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input value="{{$vendor->vendor_address}}" type="text" name="address"></td>
            </tr>
        </table>

        <input type="submit" value="Update">
    </form>

</body>

</html>