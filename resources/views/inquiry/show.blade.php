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
                                <h2 class="text-5xl font-bold">Inquiry</h2>
                            </td>
                            <td>
                                <h2 class="text-3xl font-bold">{{$inquiry->customer->company_name}}</h2>
                                Inquiry NO | IQ#00{{$inquiry->id}} <br> Date | {{$inquiry->created_at}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="border-t-4 ">
                                <br>{{$inquiry->customer->address}},<br>
                                {{$inquiry->customer->zipcode}},{{$inquiry->customer->city}},{{$inquiry->customer->country}}
                                <br>
                                Phone | {{$inquiry->customer->phone}} <br> E-mail |{{$inquiry->customer->email}}<br>

                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="para">
                <td colspan="2">
                    <table>
                        <td>
                            <h4 class="font-bold">To Whom It May Concern:</h4>
                            <pre>
                I am {{$inquiry->customer->name}}, and I am a purchasing agent for {{$inquiry->customer->company_name}}
         in {{$inquiry->customer->city}},{{$inquiry->customer->country}}. I was looking through your website, and I would like to receive a 
         quote for the following products :</pre>



                        </td>


                    </table>

                </td>

            </tr>

        </table>

        <table>
            <tr class="tagheading">
                <td>
                    Quantity
                </td>

                <td>
                    Product
                </td>
                <td>
                    Color
                </td>
                <td>
                    Product Number.
                </td>
            </tr>

            @foreach($inquiry->products as $product)
            <tr class="item">
                <td>{{$product->pivot->qty}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->color}}</td>
                <td style="font-style: oblique;"> HS-00{{$product->id}}</td>
            </tr>
            @endforeach
            <tr class="para">
                <td colspan="2">
                    <table>
                        <td>

     <pre>
 A qoute by email or phone number would be ideal,
 Thank you

 {{$inquiry->customer->name}} | {{$inquiry->customer->company_name}},
 Purchasing Agent
 Phone: {{$inquiry->customer->phone}}.
                            </pre>



                        </td>


                    </table>

                </td>

            </tr>

            <tr>
                <td>
                    <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-blue-800 focus:bg-white" href="/quotation/create/{{$inquiry->id}}">Create Quotation</a> </h3>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
@endsection