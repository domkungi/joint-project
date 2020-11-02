@extends('layouts.app4')


@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

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

        .invoice-box table tr.tagheading .sub {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            text-align: right;
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



<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>

                            <img src="{{ URL::to('/assets/img/logo.jpg') }}" style="width:100%; max-width:300px;">


                                <br>
                                Handsome, Inc. <br>
                                Nimmana Haeminda Rd Lane 1, Suthep, Mueang,<br>
                                Chiangmai, Thailand 50000<br>
                                Phone. 444-4562130 Email. handsome@gmail.com<br>

                            </td>

                            <td>
                                <h1 class="text-2xl font-bold">Picking List</h1><br>Inquiry NO. : SO#00{{$picking->sale_order_id}}<br> Date: {{$picking->created_at}}

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

           
            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="font-black">Bill To :</td>
                            <td class="font-black">Ship To :</td>

                        <tr>
                            <td>
                                {{$picking->customer->company_name}}<br> {{$picking->customer->address}}<br>
                                {{$picking->customer->city}},{{$picking->customer->country}} {{$picking->customer->zipcode}}
                            </td>
                            <td>
                                {{$picking->customer->company_name}}<br> {{$picking->customer->address}}<br>
                                {{$picking->customer->city}},{{$picking->customer->country}} {{$picking->customer->zipcode}}
                            </td>
                        </tr>


                    </table>
                </td>
            </tr>
            <table>
            <tr class="tagheading">
                <td>
                    Customer
                </td>

                <td>
                    P.O DATE
                </td>
                <td>
                    Requested Delivery Date
                </td>

                <td>
                    SHIPPED VIA
                </td>
                <td>
                    F.O.B POINT
                </td>
                <td>
                    Payment Terms
                </td>

            </tr>

            <tr class="item">
                <td>
                    {{$picking->customer->name}}
                </td>
                <td>
                    {{$picking->customer->created_at}}
                </td>
                <td>
                    {{$picking->saleOrder->requested_delivery_date}}
                </td>

                <td>
                    Ground
                </td>
                <td>
                    Receivng Dock
                </td>
                <td>
                    Cash
                </td>

            </tr>


        </table>
        <table>
            <div class="group ">
                <tr class="tagheading">
                    <td>
                        ProductID
                    </td>
                    <td>
                        Product Name
                    </td>
                    <td>
                        Color
                    </td>
                    <td>
                        Quantity Type
                    </td>
                    <td>
                        Quantity Ordered
                    </td>
                    <td>
                        Storage Location
                    </td>
                    <td>
                        Quantity Ordered
                    </td>
                    <td>
                        Storage Location
                    </td>

                </tr>
                @foreach($picking->products as $product)
                <tr class="item ">
                    <td>
                        HS#00{{$product->id}}
                    </td>
                    <td>
                        {{$product->name}}
                    </td>

                    <td>
                        {{$product->color}}
                    </td>
                    <td>
                        Car
                    </td>
                    <td>
                        {{$product->pivot->qty}}
                    </td>
                    <td>
                        {{$picking->storage_id}}
                    </td>
                    <td style="color: blue;" class="font-black">
                        {{$product->pivot->qty}}
                    </td>
                    <td  style="color: blue;" class="font-black">
                        {{$picking->storage_id}}
                    </td>


                </tr>
                @endforeach


               
        </table>
        <table>
        <tr><td>

        </td>
                    <td></td>
                    <div class="center text-center">
                        <h3>THANK YOU FOR YOUR BUSINESS!!</h3>
                    </div>
                    </td>

                </tr>

                <tr>
                    <td class="text-center">
                        <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-800 focus:bg-white" href="/invoice/create/{{$picking->saleOrder->id}}">Create Invoice</a></h3>
                </tr>
        </table>
    </div>


    </div>
</body>

</html>

@endsection