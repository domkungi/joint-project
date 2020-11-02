@extends('layouts.app')
@push('styles')
<style>
    html {
        background-color: #ddd;
    }

    .invoice-box {
        background-color: white;

        max-width: 1000px;
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
        text-align: left;

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
        font-size: 45px;
        line-height: 45px;
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

    h1 {
        font-size: 50px;
    }
</style>
@endpush
@section('content')



<form action="/rfq/store/{{$pr->id}}" method="post">
    @csrf

    <body onload=startTime()>


        <div class="invoice-box">

            <p x-text="isOpen"></p>
           
            <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;" class="py-10">Create Request For Quotation</h1>
            <h2>Created At |<div id="txt"></div></h2>
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table class=" font-serif">


                            <tr>
                                <td>Employee |
                                    <select class="text-black border-2 bg-gray-200 " name="employee_id">
                                        @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            
                            </tr>
                             <tr>
                                <td>Vendor |
                                    <select class="text-black border-2 bg-gray-200 " name="vendor_id">
                                        @foreach($vendors as $vendor)
                                        <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class=" font-serif">
                                    Due Date | <input class="border-2 bg-gray-200 " type="text" name="duedate" value='{{date("Y/m/d")}}'><br>
                                </td>                         
                            </tr>
                           
                        </table>
                    </td>
                </tr>

            </table>


            <table>
                <tr class="tagheading">


                    <td>
                        Product_id
                    </td>
                    <td>
                        Product Name
                    </td>
                    <td>
                        QTY
                    </td>


                </tr>

                @csrf
                @foreach($pr->products as $product)
                <tr class="item">

                    <td>            
                         HS-00{{$product->id}}

                    </td>

                    <td>
                        {{$product->name}}
                    </td>
                    <td>
                    {{$product->pivot->qty}}
                    </td>



                </tr>
                @endforeach
                <tr>
                    <td>
                        <input class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg" type="submit" value="Create">
                    </td>
                </tr>






            </table>


        </div>





</form>

</body>


@endsection


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