<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    private function findBySlug($slug)
    {
        $dish = Dish::where("slug", $slug)->withTrashed()->first();

        if (!$dish) {
            abort(404);
        }

        return $dish;
    }

    private function generateSlug($text)
    {
        $toReturn = null;
        $counter = 0;


        do {
            $slug = Str::slug($text);

            if ($counter > 0) {
                $slug .= "-" . $counter;
            }
            $slug_exist = Dish::where("slug", $slug)->first();
            if ($slug_exist) {
                $counter++;
            } else {
                $toReturn = $slug;
            }
        } while ($slug_exist);

        return $toReturn;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $dishes = Dish::orderBy("created_at", "desc")->where('user_id', $user_id)->paginate(9);
        return view("admin.dishes.index", compact("dishes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.dishes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|min:1",
            "description" => "required|min:10",
            "price" => "required|numeric|min:1|max:999",
            "dish_img" => "required|image",
        ]);

        $dish = new Dish();
        $dish->fill($validatedData);
        $dish->user_id = Auth::user()->id;
        $dish->slug = $this->generateSlug($dish->name);
        $dishImg = Storage::put("/dish_images", $validatedData["dish_img"]);
        $dish->dish_img = $dishImg;

        $dish->save();

        return redirect()->route("admin.dishes.show", $dish->slug)->with('message', "Piatto creato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $dish = $this->findBySlug($slug);
        return view("admin.dishes.show", compact("dish"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $dish = $this->findBySlug($slug);

        return view("admin.dishes.edit", compact("dish"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $validatedData = $request->validate([
            "name" => "required|min:1",
            "description" => "required|min:10",
            "price" => "required|numeric|min:1|max:999",
            "dish_img" => "nullable|image"
        ]);

        $dish = $this->findBySlug($slug);

        if (key_exists("dish_img", $validatedData)) {
            //se esiste già un immagine per quel post
            //devo eliminare prima quella vecchia
            if ($dish->dish_img) {
                Storage::delete($dish->dish_img);
            }

            $dishImg = Storage::put("/dish_images", $validatedData["dish_img"]);

            $dish->dish_img = $dishImg;
        }

        if ($validatedData["name"] !== $dish->name) {

            $dish->slug = $this->generateSlug($validatedData["name"]);
        }

        $dish->update($validatedData);

        return redirect()->route("admin.dishes.show", $dish->slug)->with('message', 'Piatto ' . $dish->name . ' aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $dish = $this->findBySlug($slug);

        if ($dish->trashed()) {
            $dish->forceDelete();
            Storage::delete($dish->dish_img);

            return redirect()->route("admin.dishes.trash")->with('deleted', 'Piatto ' . $dish->name . ' eliminato definitivamente');
        } else {
            $dish->delete();

            return redirect()->route("admin.dishes.index")->with('deleted', 'Piatto ' . $dish->name . ' eliminato correttamente');
        }
    }

    public function restore($slug)
    {
        $dish = $this->findBySlug($slug);

        $dish->restore();

        return redirect()->route("admin.dishes.index")->with('restored', 'Piatto ' . $dish->name . ' ripristinato correttamente');
    }

    public function trash()
    {
        $user_id = Auth::user()->id;
        $dishes = Dish::orderBy("created_at", "desc")->where('user_id', $user_id)->onlyTrashed()->paginate(9);

        return view("admin.dishes.trash", compact("dishes"));
    }
}
