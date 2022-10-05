<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewOrdersMail;
use App\Mail\AdminOrderMail;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RestaurantController extends Controller
{
    public function show($slug)
    {
        $restaurant = User::where("slug", $slug)->first();

        $restaurant->load("dishes","categories");

        if ($restaurant->restaurant_img) {
            $restaurant->restaurant_img = asset("storage/" . $restaurant->restaurant_img);
        } else {
            $restaurant->restaurant_img = asset("img/placeholder.jpg");
        }

        return response()->json($restaurant);
    }

    public function orders(Request $request){
    
        //validate data and fill
        $validatedOrderData = $request->validate([
            "name" =>"required|string|max:25|min:1",
            "surname" => "required|string|max:25|min:1",
            "address" => "required|max:70|min:5",
            "mail" => "required|email|max:255",
            "phone" => "required|digits_between:8,12",
            "user_id" => "required",
            "code" => "required",
            "total_price" => "required",
        ]);


        $newOrder = new Order();
        $newOrder->fill($validatedOrderData);
        $newOrder->save();

        if (is_array($request->dishes) || is_object($request->dishes)) {
            foreach ($request->dishes as $dish) {
                $newOrder->dishes()->attach($dish['dish_id'], ['quantity' => $dish['quantity'], 'subtotal' => $dish['subtotal']]);
            }
        } else
        {
            echo "Unfortunately, an error occured.";
        }

        //mail section
        Mail::to($newOrder->mail)->send(new NewOrdersMail($newOrder));
        $restaurant = User::find($newOrder->user_id);
        Mail::to($restaurant->email)->send(new AdminOrderMail($newOrder));
        
    }
}
