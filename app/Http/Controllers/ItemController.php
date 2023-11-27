<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::orderBy('id', 'DESC')->get();

        return Inertia::render('app', [
            'items' => $items->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        if ($item) {
            $item->name = $request->item['name'];
            $item->save();

            return back();
        }

        return back()->with([
            'error' => ['Item is not exist.'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $item = Item::find($id);

        if ($item) {
            $item->delete();

            return back();
        }

        return back()->with([
            'error' => ['Item is not exist.'],
        ]);
    }
}
