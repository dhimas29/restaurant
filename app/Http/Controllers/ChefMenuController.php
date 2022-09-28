<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChefMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChefMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chef = ChefMenu::paginate(5);
        return view('admin.chef.index', [
            'chef' => $chef,
            'title' => 'Dashboard | Chef'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.chef.create', [
            'category' => $category,
            'title' => 'Dashboard | Chef'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChefMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category_id' => 'required',
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'no_telp' => 'required',
            'foto' => 'image|file|max:1024',
        ]);

        if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('chef-images');
        }

        ChefMenu::create($validateData);
        return redirect('/chefMenu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChefMenu  $chefMenu
     * @return \Illuminate\Http\Response
     */
    public function show(ChefMenu $chefMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChefMenu  $chefMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(ChefMenu $chefMenu)
    {
        $category = Category::all();
        return view('admin.chef.edit', [
            'chef' => $chefMenu,
            'category' => $category,
            'title' => 'Dashboard | Chef'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChefMenuRequest  $request
     * @param  \App\Models\ChefMenu  $chefMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChefMenu $chefMenu)
    {
        $rules = [
            'category_id' => 'required',
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'no_telp' => 'required',
        ];
        $validateData = $request->validate($rules);

        if ($request->file('foto')) {
            if ($chefMenu->foto) {
                Storage::delete($chefMenu->foto);
            }
            $validateData['foto'] = $request->file('foto')->store('chef-images');
        }
        ChefMenu::where('id', $chefMenu->id)
            ->update($validateData);
        return redirect('/chefMenu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChefMenu  $chefMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChefMenu $chefMenu)
    {
        if ($chefMenu->foto) {
            Storage::delete($chefMenu->foto);
        }
        $chefMenu::destroy($chefMenu->id);
        return redirect('/chefMenu');
    }
}
