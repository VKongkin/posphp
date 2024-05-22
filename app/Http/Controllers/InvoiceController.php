<?php

// app/Http/Controllers/InvoiceController.php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\View;
use PDF;

class InvoiceController extends Controller
{
    public function generateInvoice(Order $order)
    {
        $data = [
            'order' => $order,
        ];

        return View::make('invoices.invoice', $data);
    }
    public function show()
    {
        return view('invoices.invoice');
    }

    public function print()
    {
        return view('invoices.print');
    }
}
