<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
    <style>
        html {
            background-color: #ddd;
        }

        .invoice-box {
            background-color: white;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: center;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr.top td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 18px;
            line-height: 30px;
            color: #333;
        }

        .invoice-box table tr.information table td:nth-child(2) {
            padding-bottom: 40px;
            text-align: right;
        }

        .invoice-box table tr.tagheading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .group {
            padding-top: 50px;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/

        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>


<form action="/gr/store/{{$po->id}}" method="post">
    @csrf

    <body onload=startTime()>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    <h1 class="text-6xl font-bold">Goods Receipt Create</h1>
                                    <div id="txt"></div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <br>
                                    Purchase Order Number | <input class="border-2 bg-gray-200 " type="text" value='PO#00{{$po->id}}'><br>

                                </td>
                            </tr>


                        </table>
                    </td>
                </tr>
                <table>
                    <tr class="tagheading">
                        <td>
                            Certified by
                        </td>
                        <td>
                            Storage In
                        </td>

                        <td>
                            Ordered by
                        </td>
                        <td>
                            Approved by
                        </td>



                    </tr>

                    <tr class="item">
                        <td>
                            <select name="employee_id" class="border-2 bg-gray-200 ">
                                @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="storage_id" class="border-2 bg-gray-200 ">
                                @foreach($storages as $storage)
                                <option value="{{$storage->id}}">{{$storage->country}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="border-2 bg-gray-200 " type="text" value='{{$po->vendor->name}}'>
                        </td>
                        <td>
                            <input class="border-2 bg-gray-200 " type="text" value='{{$po->vendor->name}}'>
                        </td>

                    </tr>


                </table>




                <table>
                    <div class="group">
                        <tr class="tagheading">
                            <td>
                                Product Name
                            </td>
                            <td>
                                Color
                            </td>
                            <td>
                                Quantity
                            </td>
                            <td>
                                Unit Price
                            </td>

                         

                        </tr>
                        @foreach($po->inboundQuotation->products as $product)
                        <tr class="item">
                            <td>
                                {{$product->name}}
                            </td>

                            <td>
                                {{$product->color}}
                            </td>

                            <td>
                                <input class="border-2 bg-gray-200 " type="text" value='{{$product->pivot->qty}}' name="qty">
                            </td>
                            <td>
                                ${{number_format($product->pivot->price,2)}}
                            </td>
                           

                        </tr>
                        @endforeach


                        <tr>
                            <td>
                                <h3 class="py-5"><input type="submit" class="bg-gray-700 py-1 px-4 rounded-sm text-white  bg-opacity-50 hover:bg-red-800 focus:bg-white" value="submit"></h3>
                        </tr>
                </table>
        </div>


        </div>
    </body>
</form>

</html>

@push('scripts')
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;

        function addCommas(nStr) //ฟังชั่้นเพิ่ม คอมม่าในการแสดงเลข
        {
            nStr += '';
            x = nStr.split('.');
            show = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                show = show.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

    }
</script>
@endpush