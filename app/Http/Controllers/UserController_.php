<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        // $data = UserModel::all();
        $data = UserModel::OrderBy('id', 'asc')->paginate(5);
        return view('halaman.index')->with('data', $data);
    }

    function edit($id)
    {
        return "Hai dari controller 2 edit";
    }
}
