<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        return view('list');
    }
    public function create(Request $request)
    {
        $item = new Item();
        $item->item = $request->text;
        $item->save();
        return "done";

    }
}
