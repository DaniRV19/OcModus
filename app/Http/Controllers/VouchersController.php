<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VouchersController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::get()->all();

        return view('products.index', [
            'vouchers' => $vouchers
        ]);
    }
}
