@extends('layouts.admin')

@section('title', 'Invoice')
@section('content-header', 'Invoice')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset('quotation/stylesheet.css') }}">
</head>
<body class="" style="background-color: white !important;">
<div class="invoice-container">
        <div class="row mt-2">
            <div class="col-sm-12 ">
                <div class="p-1">
                <p class="inv-head text-right"><span class="underlined-text" style="font-size: 40px;"><b>QUOTATION</b></span></p>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="p-1">
                <p class="inv-head left-text" style="font-size: 35px;"><span ><b>VoeunKongkin</b></span></p>
                </div>
            </div>

        </div>
        <div class="row body-font">
            <div class="col-sm-2">
                <p>Address</p><br>
                <p>Email</p>

            </div>
            <div class="col-sm-6 left-text">
                <p>:  No. 14G, St Betong, Songkat Kakab, Khan Poseanchey, Phnom Penh, Cambodia</p>
                <p>:  Kongkin928@gmail.com</p>
            </div>
            <div class="col-sm-2 right-text">
                <p>Customer ID :</p>
                <p>Quotation :</p>
                <p>Date :</p>
                <p>Validity :</p>
            </div>
            <div class="col-sm-2 right-text">
                <p>Idfe9737</p>
                <p>Idfe9737</p>
                <p>Idfe9737</p>
                <p>Idfe9737</p>
            </div>
        </div>
<br>
        <div class="row body-font">
            <div class="col-sm-2">
                <p>Bill to</p>
                <p>Address</p><br>
                <p>Contact</p>
                <p>Phone</p>
                <p>Email</p>

            </div>
            <div class="col-sm-6 left-text">
                <p>: Kongkin Cambodia Co,.LTD</p>
                <p>: 888 Russian Federation Blvd, Sangkat Toeuk Thla, Khan Sen sok, Phnom Penh</p>
                <p>: Mr.Samrach</p>
                <p>: 061 69 33 77</p>
                <p>: SDC.Cambodia@nhealth-asia.com</p>
            </div>
            <div class="col-sm-2 right-text">
                <p>  </p>
                <p> </p>
                <p> </p>
                <p> </p>
            </div>
            <div class="col-sm-2 right-text">
                <p></p>
                <p></p>
                <p></p>
                <p></p>
            </div>
        </div>
<br><br>
        <div class="row">
      <!-- Address Column -->

    <table class="invoice-items">
        <thead>
            <tr>
                <th class="th-bat1 center-text table-width" >ITEM</th>
                <th class="th-bat2 center-text table-width" >DESCRIPTION</th>
                <th class="th-bat3 center-text table-width" >QUANTITY</th>
                <th class="th-bat4 center-text table-width" >UNIT PRICE</th>
                <th class="th-bat5 center-text table-width" >TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalAmount = 0; // Initialize total amount variable
                $startNumber = 1;
            @endphp

            @foreach ($order->products as $product)
                <tr>
                    <td class="center-text table-list td-li"> {{ $startNumber++ }} </td>
                    <td class="table-list td-li">{{ $product->name }}</td>
                    <td class="center-text table-list td-li">{{ $product->pivot->quantity }}</td>
                    <td class="right-text table-list td-li accounting-format">{{ number_format($product->price, 2) }}</td>
                    <td class="right-text table-list td-li accounting-format">{{ number_format($product->pivot->quantity * $product->price, 2) }}</td>
                </tr>

                @php
                    $totalAmount += $product->pivot->quantity * $product->price; // Update total amount
                @endphp
            @endforeach
            @php
            $totalAmount = number_format($totalAmount,2);
            $amount = $totalAmount;
            $numberInWords = spellNumber($amount);
            @endphp
        </tbody>
        <tbody>
            <tr class="pic">
                <td class="table-list"></td>
                <td class="table-list center-text"> <img src="{{ Storage::url($product->image) }}" alt="" width="200"> </td>
                <td class="table-list"></td>
                <td class="table-list"></td>
                <td class="table-list"></td>
            </tr>
        </tbody>
        <tbody>
            <tr class="right-text">
                <td class="th-bat table-list"></td>
                <td class="th-bat table-list"></td>
                <td class="th-bat table-list"></td>
                <td class="th-bat table-width">Total</td>
                <td class="th-bat table-width accounting-format">{{ $totalAmount }}</td>
            </tr>
        </tbody>
        <tbody class="th-bat table-width total">
            <td colspan="3" class="th-bat table-width center-text"><b>{{ $numberInWords }}  </b></td>
            <td class="th-bat table-width right-text"><b>Sub Total</b></td>
            <td class="th-bat table-width right-text accounting-format"><b>{{ $totalAmount }}</b></td>

        </tbody>
    </table>

    <table>
        <tr>
            <td class="th-bat table-width center-text" ><i>Remark</i></td>
        </tr>
    </table>
        <div class="row body-font term">
            <div class="col-sm-3" style="width: 180px;">
                <p>Minimun order</p>
                <p>Payment Method</p>
                <p>Shipment Method</p>
                <p>Lead Time</p>

            </div>
            <div class="col-sm-9 left-text">
                <p>: 480 pieces</p>
                <p>: 15 Days</p>
                <p>: Door to door (Free delivery)</p>
                <p>: 7 Days to 14 Days after placed order</p>
            </div>
        </div>
    <table>
        <tr class="center-text">
            <td rowspan="3" class="signature-table th-bat">Approved by:</td>
            <td rowspan="3" class="signature-table th-bat">Quoted by:</td>
        </tr>
    </table>
    <div><br><br><br><br><br></div>
    <table>
        <tr class="center-text">
            <td rowspan="3" class="signature-table th-bat"></td>
            <td rowspan="3" class="signature-table th-bat">VoeunKongkin</th>
        </tr>
    </table>


</div>
</body>
</html>
@endsection