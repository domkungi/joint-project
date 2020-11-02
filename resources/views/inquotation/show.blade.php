@extends('layouts.app3')


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
                                <h1 class="text-4xl font-bold">{{$inquotation->vendor->name}}</h1>

                                <br>
                                {{$inquotation->vendor->address}} {{$inquotation->vendor->city}}<br>
                                {{$inquotation->vendor->zipcode}} {{$inquotation->vendor->country}}<br>
                                Phone. {{$inquotation->vendor->phone}}<br>
                                {{$inquotation->vendor->email}}
                            </td>

                            <td>
                                <h1 class="text-2xl font-bold">Quotation</h1><br>RFQ NO. : RFQ#00{{$inquotation->request_for_quotation_id}}<br> Date: {{$inquotation->created_at}}

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>

                                <h1 class="font-black">Quotation For :</h1>
                                <div class="hand"> Handsome, Inc.<br> 12345 Sunny Road<br> Sunnyville, CA 12345</div>
                            </td>

                            <td>
                                Quotation Valid Until : {{$inquotation->duedate}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>





        </table>
        <table>
            <tr class="tagheading">
                <td>
                    Saleperson
                </td>

                <td>
                    P.O. Number
                </td>
                <td>
                    Ship Date
                </td>

                <td>
                    Ship Via
                </td>
                <td>
                    Payment Terms
                </td>

            </tr>

            <tr class="item">
                <td>
                    {{$inquotation->vendor->name}}-Sale
                </td>
                <td>
                    -
                </td>
                <td>
                    {{date("Y/m/d") }}
                </td>

                <td>
                    Ground
                </td>
                <td>
                    Cash
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

                    <td>
                        Total Price
                    </td>

                </tr>
                @foreach($inquotation->products as $product)
                <tr class="item">
                    <td>
                        {{$product->name}}
                    </td>

                    <td>
                        {{$product->color}}
                    </td>

                    <td>
                        {{$product->pivot->qty}}
                    </td>
                    <td>
                        ${{number_format($product->pivot->price,2)}}
                    </td>
                    <td>
                        ${{number_format($product->pivot->totalprice,2)}}
                    </td>

                </tr>
                @endforeach


                <tr class=" tagheading">
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>
                        SUBTOTAL<br>VAT<br>TOTAL
                    </td>
                    <td>
                        ${{number_format($inquotation->subtotal,2)}}<br>${{number_format($inquotation->vat,2)}}<br> ${{number_format($inquotation->total,2)}}
                    </td>
                </tr>



                <tr class="Thank">
                    <td>
                        If you have any questions concerning this quotation contact Name, Phone Number, Email<br>
                        <div class="center">
                            <h3>THANK YOU FOR YOUR BUSINESS!!</h3>
                        </div>
                    </td>

                </tr>

                <tr>
                    <td>
                        <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/po/create/{{$inquotation->id}}">Create Purchase Order </a></h3>
                </tr>
        </table>
    </div>


    </div>
</body>

</html>
@endsection