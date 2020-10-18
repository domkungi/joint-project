@extends('layouts.app')

@push('styles')
<style>
          html{
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
@endpush
   
@section('content')
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://www.sparksuite.com/images/logo.png"
                                    style="width:100%; max-width:300px;">
                            </td>

                            <td>
                                RFQ NO | RFQ#00{{$rfq->id}} <br> PR NO | PR#00{{$rfq->purchaseRequisition->id}}<br> Created | {{$rfq->created_at}}
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
                                Handsome, Inc.<br> 12345 Sunny Road<br> Sunnyville, CA 12345
                            </td>
                            
                            <td>
                                Vendor ID | VD#00{{$rfq->vendor->id}}<br> Name | {{$rfq->vendor->name}}<br> E-mail | {{$rfq->vendor->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table style="border: 1px solid;">
                        
                        <td><h1></h1>employee ID |    EM#00{{$rfq->employee->id}} </td> <td> name | {{$rfq->employee->name}}</td>  <td>e-mail | {{$rfq->employee->email}}</td>
                       
                    </table>
                </td>
            </tr>
            <tr class="para">
                <td colspan="2">
                    <table>
                        <td>
                            Dear Sir / Madam : <br>
                            <pre>   I would like to request a quote for your product. I have seen that your company
  sells several different models, I feel the __________ would be the most appropriate.
  I would also know how long it would take to ship the _______ to [place where you live].
                                
  Sincerely,

  [Employee or Company Name]
                        </td>


                    </table>

                </td>

            </tr>

            <!-- <tr class="heading">
                <td>
                    Payment Method
                </td>

                <td>
                    Check #
                </td>
            </tr> -->

            <!-- <tr class="details">
                <td>
                    Check
                </td>

                <td>
                    1000
                </td>
            </tr> -->

        

            <!-- <tr class="total">
                <td></td>

                <td>
                    Total: $385.00
                </td>
            </tr> -->
        </table>

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
                    QTY
                </td>
             </tr>

             @foreach($rfq->products as $product)
						<tr class="item">
							<td style="font-style: oblique;">
								HS-00{{$product->id}}
								
							</td>
							<td>{{$product->name}}</td>
                            <td>{{$product->color}}</td>
                            <td>{{$product->pivot->qty}}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td>
                            <h3 class="py-5"><a class="bg-gray-700 py-1 px-4 rounded-sm text-white text-lg bg-opacity-50 hover:bg-red-800 focus:bg-white" href="/inquotation/create/{{$rfq->id}}">Create Inbound Quotation</a> </h3>
                            </td>
                        </tr>
        </table>
    </div>
@endsection