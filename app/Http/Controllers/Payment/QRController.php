<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QRController extends Controller
{
    //
    public function index(){
        


        return view('payment.qrpayment');
    }
}
