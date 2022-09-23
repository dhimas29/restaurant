<?php

namespace App\Http\Controllers;

use App\Models\Food;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user()
    {
        $datas = User::orderBy('usertype')->paginate(1);
        return view('admin.user.index', compact("datas"));
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
}
