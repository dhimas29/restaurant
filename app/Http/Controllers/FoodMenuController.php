<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use Illuminate\Http\Request;

class FoodMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = FoodMenu::latest()->paginate(1);
        return view('admin.food.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new FoodMenu;
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('image', $imageName);
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function show(FoodMenu $foodMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodMenu $foodMenu)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodMenu $foodMenu, $id)
    {
        $foodMenu::destroy($id);
        return redirect()->back();
    }
}
