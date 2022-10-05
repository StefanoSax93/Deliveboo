<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewOrdersMail;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index() 
    {
        $user_id = Auth::user()->id;
        $orders= Order::orderBy('created_at', 'desc')->where('user_id', $user_id)->paginate(5);
        return view("admin.orders.index", compact("orders"));
    }

}
