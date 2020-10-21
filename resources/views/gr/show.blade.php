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
                            <td class="title">
                                <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">
                            </td>

                            <td>
                                <h2 class="text-2xl font-bold">Goods Receipt</h2>PO NO. | PO#00{{$gr->id}}<br> Date | {{$gr->created_at}}
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
                                <br> Handsome, Inc.<br> 12345 Sunny Road<br> Sunnyville, CA 12345
                            </td>

                            <td class="border-t-4 ">
                                <br>Vendor ID | VD#00{{$gr->purchaseOrder->vendor->id}}<br>
                                Ordered By | {{$gr->purchaseOrder->vendor->name}}<br>
                                Approved By | {{$gr->purchaseOrder->vendor->name}}<br>
                                E-mail | {{$gr->purchaseOrder->vendor->email}}<br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table>

                        <td>
                            <h1></h1>employee ID | EM#00{{$gr->purchaseOrder->employee->id}} <br>
                            name | {{$gr->purchaseOrder->employee->name}} <br>
                            e-mail | {{$gr->purchaseOrder->employee->email}}
                        </td>

                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Currency | USD <br> Storage in {{$gr->storage->country}}
                </td>

                <td>
                    Check | GR#00{{$gr->id}}
                </td>
            </tr>

          


           


            <table>
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
                        QTY Ordered
                    </td>
                    <td>
                        QTY Received
                    </td>
                    <td>
                        Unit Cost
                    </td>
                    <td>
                        Total Value
                    </td>
                    <td>
                        Balance.
                    </td>
                </tr>
                <p hidden>{{$total = 0}}</p> 
                <p hidden>{{$totalbalance = 0}}</p> 
                @foreach($gr->stocks as $stock)
                <p hidden>{{$stock_qty=$stock->inbound_qty}}</p> 
                @endforeach
                @foreach($gr->purchaseOrder->inboundQuotation->products as $product)

                <tr class="item">
                    <td style="font-style: oblique;">
                        HS-00{{$product->id}}
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->color}}</td>
                    <td>{{$product->pivot->qty}}</td>
                    <td>{{$stock_qty}}</td>
                    <td>{{number_format($product->pivot->price,2)}}</td>
                    <p hidden>{{$totalprice = $stock_qty*$product->pivot->price}}</p> 
                    <p hidden>{{$balance = ($product->pivot->qty)*($product->pivot->price)-$totalprice }}</p> 
                    <td>{{number_format($totalprice,2)}}</td>
                    <td>{{number_format($balance,2)}}</td>
                    <p hidden>{{$total = $total+$totalprice  }}</p> 
                    <p hidden>{{$totalbalance += $balance  }}</p> 
                </tr>

                @endforeach

            
            </table>
            <tr>
                            <td>
                            <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/gr">Go back</a> </h3>
                            </td>
                        </tr>
            
    </div>
</body>

</html>