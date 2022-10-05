<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function categories()
    {
        $categories = Category::all();

        $categories->map(function ($category) {

            if ($category->img) {
                $category->img = asset("img/" . $category->img);
            } else {
                $category->img = asset("img/placeholder.jpg");
            }


            return $category;
        });

        return response()->json($categories);
    }

    public function restaurants()
    {
        $users = User::with(['categories'])->get();
        return response()->json($users);
    }

    public function filtered($category)
    {
        if ($category != "all") {
            $restaurants = User::whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category);
            })->get();
        } else {

            $restaurants = User::all();
        }


        foreach ($restaurants as $restaurant) {
            $categories = [];
            $categories = $restaurant->categories;
            $restaurant->categories = $categories;
        };

        return response()->json($restaurants);
    }
}
