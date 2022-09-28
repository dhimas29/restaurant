<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class FoodMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = FoodMenu::latest()->paginate(4);
        return view('admin.food.index', [
            'datas' => $datas,
            'title' => 'Dashboard | Food Menu'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food.create', [
            'title' => 'Dashboard | Food Menu',
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|unique:food_menus',
            'price' => 'required',
            'image' => 'image|file|max:1024',
            'description' => 'required',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('food-images');
        }

        FoodMenu::create($validateData);
        return redirect('/foodMenu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function show(FoodMenu $foodMenu)
    {
        return view('admin.food.show', [
            'title' => 'Dashboard | Food Menu',
            'foodMenu' => $foodMenu
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodMenu $foodMenu)
    {
        return view('admin.food.edit', [
            'foodData' => $foodMenu,
            'category' => Category::all(),
            'title' => 'Dashboard | Food Menu'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodMenu $foodMenu)
    {
        $rules = [
            'category_id' => 'required',
            'title' => 'required|max:255',
            'price' => 'required',
            'image' => 'image|file|max:1024',
            'description' => 'required',
        ];
        if ($request->slug != $foodMenu->slug) {
            $rules['slug'] = 'required|unique:food_menus';
        }
        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($foodMenu->image) {
                Storage::delete($foodMenu->image);
            }
            $validateData['image'] = $request->file('image')->store('food-images');
        }
        FoodMenu::where('id', $foodMenu->id)
            ->update($validateData);
        return redirect('/foodMenu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodMenu $foodMenu, $id)
    {
        if ($foodMenu->image) {
            Storage::delete($foodMenu->image);
        }
        $foodMenu::destroy($id);
        return redirect('/foodMenu', [
            'title' => 'Dashboard | Food Menu'
        ]);
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(FoodMenu::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
