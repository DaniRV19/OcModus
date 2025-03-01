<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VouchersController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();

        return view('admin.vouchers.index', [
            'vouchers' => $vouchers
        ]);
    }

    public function create()
    {
        return view('admin.vouchers.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Voucher::create([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return redirect('/vouchers');
    }

    public function show(Voucher $voucher)
    {
        return view('admin.vouchers.show', ['Voucher' => $voucher]);
    }

    public function edit(Voucher $voucher)
    {
        return view('admin.vouchers.edit', ['Voucher' => $voucher]);
    }

    public function update(Voucher $voucher)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $voucher->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return redirect('/vouchers/' . $voucher->id);
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return redirect('/vouchers');
    }
}
