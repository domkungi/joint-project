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
                                <h1 class="text-2xl font-bold">Quotation</h1><br>
                                Quotation NO. : QT#00{{$quotation->id}}<br>
                                Inquiry NO. : IQ#00{{$quotation->inquiry_id}}<br> 
                                Date: {{$quotation->created_at}} <br>
                                Quotation Valid Until : {{$quotation->duedate}}

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
                                <div class="hand"> {{$quotation->customer->company_name}}<br>
                                    {{$quotation->customer->address}}<br>
                                    {{$quotation->customer->city}},{{$quotation->customer->country}} {{$quotation->customer->zipcode}} <br>
                                    Phone. {{$quotation->customer->phone}} Email. {{$quotation->customer->email}}
                                </div>
                            </td>

                           
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="font-black" >Bill To :</td>
                            <td class="font-black">Ship To :</td>

                        <tr>
                            <td>
                                {{$quotation->customer->company_name}}<br> {{$quotation->customer->address}}<br>
                                {{$quotation->customer->city}},{{$quotation->customer->country}} {{$quotation->customer->zipcode}}
                            </td>
                            <td>
                                {{$quotation->customer->company_name}}<br> {{$quotation->customer->address}}<br>
                                {{$quotation->customer->city}},{{$quotation->customer->country}} {{$quotation->customer->zipcode}}
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
                    Job
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
                    {{$quotation->employee->name}}
                </td>
                <td>
                    Sales Representative
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
            <div class="group ">
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
                        Discount
                    </td>
                    <td>
                        Total Price
                    </td>

                </tr>
                @foreach($quotation->products as $product)
                <tr class="item ">
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
                    <td class="sub">
                    SUB |<br><br> MEMBER |<br>  SPECIAL |
                    </td>
                    <td >
                        TOTAL<br>
                        VAT ({{($quotation->vat/$quotation->subtotal)*100}}%)<br>
                        DISCOUNT<br>
                        DISCOUNT<br>
                        TOTAL <br>

                    </td>
                    <td>
                        ${{number_format($quotation->subtotal,2)}}<br>
                        ${{number_format($quotation->vat,2)}}<br>
                        ${{number_format($quotation->member_discount,2)}} <br>
                        ${{number_format($quotation->special_discount,2)}} <br>
                        ${{number_format($quotation->total,2)}} <br>


                    </td>
                </tr>



                <tr class="Thank">
                    <td>
                        <h3 class="font-black">Discount Conditions :</h3>
                        <p>
                            - If you are member customer you will get 10% discount off the the subtotal price <br>
                            - If you buy more than 5 cars of any model, you can get 5% discount for each model. <br>
                            - If you have a purchase of more than $ 400,000, you will receive 10% off the subtotal price. <br>
                            If you have any questions concerning this quotation contact Name, Phone Number, Email
                        </p> <br>

                        <div class="center">
                            <h3>THANK YOU FOR YOUR BUSINESS!!</h3>
                        </div>
                    </td>

                </tr>

                <tr>
                    <td>
                        <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-800 focus:bg-white" href="/saleorder/create/{{$quotation->id}}">Create Sales Order </a></h3>
                </tr>
        </table>
    </div>


    </div>
</body>

</html>

@endsection