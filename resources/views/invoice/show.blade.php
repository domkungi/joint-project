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

                        </tr>
                        <tr>
                            <td >

                            <img class="py-10" src="{{ URL::to('/assets/img/logo.jpg') }}" style="width:100%; max-width:300px;">

                           <h1  class="font-black">From :</h1>
                                <br>
                                Handsome, Inc. <br>
                                Nimmana Haeminda Rd Lane 1, Suthep, Mueang,<br>
                                Chiangmai, Thailand 50000<br>
                                Phone. 444-4562130 Email. handsome@gmail.com<br>

                            </td>

                            <td>
                                <h1 class="text-4xl font-bold">Invoice</h1><br>
                                Invoice NO. : IV#00{{$invoice->id}}<br>
                                Sale Order NO. : SO#00{{$invoice->sale_order_id}}<br>
                                 Date: {{$invoice->created_at}}

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
                                {{$invoice->customer->company_name}}<br> {{$invoice->customer->address}}<br>
                                {{$invoice->customer->city}},{{$invoice->customer->country}} {{$invoice->customer->zipcode}}
                            </td>
                            <td>
                                {{$invoice->customer->company_name}}<br> {{$invoice->customer->address}}<br>
                                {{$invoice->customer->city}},{{$invoice->customer->country}} {{$invoice->customer->zipcode}}
                            </td>
                        </tr>


                    </table>
                </td>
            </tr>






        </table>
       
        <table>
            <div class="group ">
                <tr class="tagheading">
                    <td>
                        Product ID
                    </td>
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
                        Discount
                    </td>
                    <td>
                        Total Price
                    </td>

                </tr>
                @foreach($invoice->saleOrder->products as $product)
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
                        {{$product->pivot->qty}}
                    </td>
                    <td>
                        ${{number_format($product->pivot->price,2)}}
                    </td>
                    <td>
                        ${{number_format($product->pivot->discount,2)}}
                    </td>
                    <td>
                        ${{number_format($product->pivot->totalprice,2)}}
                    </td>

                </tr>
                @endforeach


                <tr class=" tagheading ">
                <td>
                    
                </td>   
                <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="sub">
                        SUB |<br><br> MEMBER |<br> SPECIAL |
                    </td>
                    <td>
                        TOTAL<br>
                        VAT ({{($invoice->saleOrder->vat/$invoice->saleOrder->subtotal)*100}}%)<br>
                        DISCOUNT<br>
                        DISCOUNT<br>
                        TOTAL <br>

                    </td>
                    <td>
                        ${{number_format($invoice->saleOrder->subtotal,2)}}<br>
                        ${{number_format($invoice->saleOrder->vat,2)}}<br>
                        ${{number_format($invoice->saleOrder->member_discount,2)}} <br>
                        ${{number_format($invoice->saleOrder->special_discount,2)}} <br>
                        ${{number_format($invoice->saleOrder->total,2)}} <br>


                    </td>
                </tr>



                <tr>



                </tr>

                <tr>
                    <td>

                </tr>
        </table>
        <div class="Thank text-center font-black">
            <h3>THANK YOU FOR YOUR BUSINESS!!</h3>
        </div>
        </td>
        <table>
            <tr></tr>
            <tr>

            </tr>
            <tr>

              
            </tr>
        </table>




    </div>

</body>


</div>
</body>

</html>

@endsection