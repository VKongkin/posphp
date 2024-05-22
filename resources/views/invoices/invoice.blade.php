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
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-container {
            width: 80%;
            margin: 0 auto;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            color: #333;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details p {
            margin: 5px 0;
        }

        .invoice-items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-items th, .invoice-items td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .invoice-total {
            text-align: right;
        }
        
        .center-text {
            text-align: center !important;
        }

        .right-text {
            text-align: right !important;
        }

        th {
            font-family: 'Times New Roman';
            font-size: 25px;
        }

        td {
            font-family: 'Times New Romans';
            font-size: 25px;
        }

        .font-cus {
            font-family: 'Times New Romans';
            font-size: 25px;
        }

        .table-width {
            border: 2px solid black !important;
        }

        .custom-hr {
            
            border: 1px solid blue !important;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .signature-table {
            width: 100%;
            margin-top: 90px;
            border-collapse: collapse;
        }

        .signature-cell {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .khmer-muol {
            font-family: 'Khmer Os Muol Light';
            font-size: 35px;
        }

        .inv-head {
            font-family: 'Times New Romans';
            font-size: 35px;
        }

        .khmer-bat {
            font-family: 'Khmer Os Battambang';
            font-size: 20px;
        }
        .kh-h1 {
            font-family: 'Khmer Os Muol Light'; 
            font-size: 35px; 
            color: blue !important;
            margin-top: 3px !important;
        }

        .english-h1 {
            font-family: 'Time New Romans'; 
            font-size: 35px; 
            color: blue !important;  /* You can adjust this color as needed */
            margin-top: 0;  /* Adjust this margin as needed */
            white-space: pre !important;
        }

        .table-none{
            border: none !important;
        }
        .th-bat{
            font-family: Khmer Os Battambang !important;
            font-size: 23px !important;
            border-bottom: none !important;
            border-top: 2px double black !important;
            border-left: 2px double black !important;
            border-right: 2px double black !important;


        }
        .th-en{
            border-top: none !important;
            border-left: 2px double black !important;
            border-right: 2px double black !important;

        }
        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .invoice-container {
                width: 100%;
                margin: 0;
                padding: 20px;
                box-sizing: border-box;
            }

            .invoice-items, .invoice-items td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
                font-size: 20px;
            }
            .invoice-details p {
            margin: 5px 0;
            font-size: 20px;
            }
            .invoice-total p{
                text-align: right;
                font-size: 20px;
            }
            .signature-table th{
                font-size: 20px;
            }
            .kh-h1, .english-h1, .inv-head, .khmer-muol{
                font-size: 30px;
            }
            .khmer-bat{
                font-size: 17px;
            }
            .custom-hr{
                border: 1px solid blue !important;
            }
            .table-width{
                border: 1px solid black !important;
            }
            .table-none{
                border-bottom: none !important;
                border-left: none !important;
                border-right: none !important;
            }
            .th-bat{
                font-size: 18px !important;
                border-bottom: none !important;
                border-top: 1px double black !important;
                border-left: 1px double black !important;
                border-right: 1px double black !important;


            }
            .th-en{
                border-top: none !important;
                border-left: 1px double black !important;
                border-right: 1px double black !important;
                border-bottom: 1px double black !important;

            }
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
<button class="btn btn-primary print-button" onclick="window.print()">Print Invoice</button>
<div class="alert alert-info print-button text-center">
    <p><strong>Print Settings:</strong> Before printing, please set the paper size to A4 and margins to None in your browser's print preview settings for the best results.</p>
</div>
    <div class="invoice-container">

    
        <div class="row mt-2">
            <div class="col-sm-2">
            <img src=" {{ asset('images/pf.jpg') }} " alt="" style="width: 150px;" class="img-circle">
            </div>
            <div class="col-sm-10 center-text">
                <div class="p-1">
                    <p class="khmer-muol">ផ្សារទំនើប វឿន គង់គីន</p>
                    <p class="inv-head"><b>VOEUN KONGKIN SUPER MARKET</b></p>
                </div>
                <div class="p-1 khmer-bat">
                    <p >អាស័យដ្ឋាន៖ ផ្ទះលេខ២,​ ផ្លូវ៣៨៩, សង្កាត់ទួលស្វាយព្រៃ១, ខណ្ឌបឹងកេងកង, រាជធានីភ្នំពេញ</p>
                    <p>ទូរស័ព្ទលេខ៖​ 096 2969 711</p>
                </div>

            </div>
            </div>
        <br><br><br>
        <div class="invoice-header">
        <div class="row d-flex justify-content-between">
            <div class="col-md-6 text-right ">
                <h1 class="kh-h1">វិក្កយបត្រ</h1>
            </div>
            <div class="col-md-6 text-left ">
                <h1 class="english-h1"><b>/  INVOICE</b></h1>
            </div>
        </div>

        </div>

        <hr class="custom-hr">
        <div class="invoice-details font-cus">
            <p><strong>Invoice Nº:</strong> {{ $order->id }}</p>
            <p><strong>Customer Name:</strong> {{ $order->customer ? $order->customer->first_name . ' ' . $order->customer->last_name : 'Unknown' }}</p>
            <p><strong>User Name:</strong> {{ $order->user->first_name }} {{ $order->user->last_name }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
        <hr class="custom-hr">
        <table class="invoice-items">
        <thead>
            <tr>
                <th class="th-bat center-text table-width" style="width: 10px;">ល.រ</th>
                <th class="th-bat center-text">ឈ្មោះទំនិញ</th>
                <th class="th-bat center-text" style="width: 25px;">ចំនួន</th>
                <th class="th-bat center-text" >តម្លៃរាយ</th>
                <th class="th-bat center-text" >សរុប</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th class="center-text th-en" style="width: 10px;">Nº</th>
                <th class="center-text th-en" >PRODUCT DESCRIPTION</th>
                <th class="center-text th-en" style="width: 25px;">QUANTITY</th>
                <th class="center-text th-en" >PRICE</th>
                <th class="center-text th-en" >TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalAmount = 0; // Initialize total amount variable
                $startNumber = 1;
            @endphp

            @foreach ($order->products as $product)
                <tr>
                    <td class="center-text table-width"> {{ $startNumber++ }} </td>
                    <td class="table-width">{{ $product->name }}</td>
                    <td class="center-text table-width">{{ $product->pivot->quantity }}</td>
                    <td class="right-text table-width">{{ number_format($product->price, 2) }} $</td>
                    <td class="right-text table-width">{{ number_format($product->pivot->quantity * $product->price, 2) }} $</td>
                </tr>

                @php
                    $totalAmount += $product->pivot->quantity * $product->price; // Update total amount
                @endphp
            @endforeach
        </tbody>
        <tbody class="table-none">
            <td class="table-none"></td>
            <td class="table-none"></td>
            <td colspan="2" class="table-none right-text"><b>Total Amount</b></td>
            <td class="table-width right-text">{{ $totalAmount }} $</td>
        </tbody>
    </table>


    <table class="signature-table">
        <tr style="text-align: center;">
            <th>Seller's Signature</th>
            <th>Buyer's Signature</th>
        </tr>
        <tr style="text-align: center;">
            <td rowspan="3" class="signature-cell">
                <br><br><p>___________________________</p>
            </td>
            <td rowspan="3" class="signature-cell">
                <br><br><p>___________________________</p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    </div>
</body>
</html>
@endsection