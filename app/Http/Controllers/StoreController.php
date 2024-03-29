<?php

namespace App\Http\Controllers;

use App\Events\OrderAdded;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return $request->user()->store->load('user');
    }
}
