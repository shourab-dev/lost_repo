<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class MyAccountController extends Controller
{
    function myAccount()
    {
        $orders = Order::with('orderItems.product:id,title')->where('customer_id', auth('customer')->id())->get();
        // dd($orders);
        return view('frontend.MyAccount', compact('orders'));
    }

    function downloadInvoice($id)
    {
        // return view('frontend.Invoice');
        $order = Order::with('orderItems.product:id,title')->where('id', $id)->where('customer_id', auth('customer')->id())->first();
        $data = compact('order');
        
        $pdf = Pdf::loadView('frontend.Invoice', $data);
        return $pdf->download('my-order-invoice.pdf');
    }
}
