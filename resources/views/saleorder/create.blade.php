@extends('layouts.app4')
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
<form action="/saleorder/store/{{$quotation->id}}" method="post">
    @csrf

    <body onload=startTime()>


        <div class="invoice-box">

            <p x-text="isOpen"></p>

            <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Create Sale Order</h1>
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>

                                </td>



                                <td class=" font-serif"> Employee |
                                    <select class="border-2 bg-gray-200 " name="employee_id">
                                        @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select> <br>
                                    Quotation No | <input class="border-2 bg-gray-200 " type="text" value="QT#00{{$quotation->id}}"><br>
                                    Customer No | <input class="border-2 bg-gray-200" type="text" value="CS#00{{$quotation->customer->id}}"> <br>



                                    Due Date |<input class="border-2 bg-gray-200" type="text" name='duedate' value='{{date("Y/m/d")}}'> <br>
                                    Requested Delivery Date |<input class="border-2 bg-gray-200" type="text" name='requested_delivery_date'> <br>
                                    Created At |<div id="txt"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <table class=" font-serif">
                    <tr>
                        <td>
                            Handsome, Inc.<br>Nimmana Haeminda Rd Lane 1, Suthep, Mueang, Chiangmai, Thailand<br> 50000
                        </td>
                    </tr>
                    <tr>
                        <td>Bill To :</td>
                        <td>Ship To :</td>
                    </tr>
                    <tr>
                        <td>
                            {{$quotation->customer->company_name}}<br> {{$quotation->customer->address}}<br>
                            {{$quotation->customer->city}},{{$quotation->customer->country}} {{$quotation->customer->zipcode}}
                        </td>
                        <td>
                            {{$quotation->customer->company_name}}<br> {{$quotation->customer->address}}<br>
                            {{$quotation->customer->city}},{{$quotation->customer->country}} {{$quotation->customer->zipcode}}
                        </td>
                        </td>
                    </tr>
                </table>

                <tr class="para">
                    <td colspan="2">

                    </td>

                </tr>


            </table>

            <table>
                <tr class="tagheading">


                    <td>
                        Product Name
                    </td>
                    <td>
                        Color
                    </td>
                    <td>
                        QTY
                    </td>
                    <td>
                        Unit Price
                    </td>

                    <td>
                        Currency
                    </td>

                </tr>

                @foreach($quotation->products as $product)
                <tr class="item">

                    <td>{{$product->name}}</td>
                    <td>{{$product->color}}</td>
                    <td><input class="border-2 bg-gray-200 " type="text" name="orders[{{$loop->index}}][qty]" value="{{$product->pivot->qty}}"></td>
                    <td>{{$product->pivot->price}}</td>

                    <td>USD</td>


                </tr>
                @endforeach

                <tr class="tagheading">
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>
                        Vat ({{($quotation->vat/$quotation->subtotal)*100}}%)
                    </td>

                    <td>
                        Member Discount (10%)
                    </td>
                    <td>
                        Special Discount (10%)
                    </td>
                </tr>
             
                <tr class="item">
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>
                        ${{number_format($quotation->vat,2)}}
                    </td>
                    <td>
                        {{$member_ans}}
                    </td>
                    <td>
                        {{$special_ans}}
                    </td>
                </tr>



            </table>
            <h3 class="py-5"><input type="submit" value="Create Sale Order " class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white"></h3>
</form>
</div>
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