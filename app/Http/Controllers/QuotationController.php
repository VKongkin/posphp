<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Order;
use PDF;

class QuotationController extends Controller
{
    public function show(Order $order)
    {
        $totalAmount = 0;
    
        foreach ($order->products as $product) {
            $totalAmount += $product->pivot->quantity * $product->price;
        }
    
        $myNumber = $totalAmount;
        $numberInWords = numberToWords($myNumber); // Assuming you have a function for number to words conversion
    
        $data = [
            'order' => $order,
            'myNumber' => $myNumber,
            'numberInWords' => $numberInWords,
        ];
    
        return view('invoices.quotation', $data);
    }
}
