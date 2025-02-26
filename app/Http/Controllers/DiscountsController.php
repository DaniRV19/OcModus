<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountsController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();

        return view('admin.discounts.index', [
            'discounts' => $discounts
        ]);
    }
}
