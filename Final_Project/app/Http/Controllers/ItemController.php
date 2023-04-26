<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ItemController extends Controller
{
    public function item(Request $request) {
        $user = $request->user();
        if($user->isAdmin == 1) {
            $categories = Category::all();
            return view('/item', compact('categories'));
        }
        else {
            return abort(403);
        }
    }

    public function addItem(Request $request) {
        $request->validate([
            'category_id' => ['required'],
            'item' => ['required','string', 'min:5', 'max:80'],
            'price' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'image' => ['required', 'image'],
        ]);

        $filename = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('/public/Item/', $filename);

        Item::create([
            'category_id' => $request->category_id,
            'item' => $request->item,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $filename,
        ]);

        return redirect('/dashboard');
    }

    public function edit(Request $request, $id) {
        $user = $request->user();
        if($user->isAdmin == 1) {
            $item = Item::findOrFail($id);
            $categories = Category::all();
            return view('editItem', compact('item', 'categories'));
        }
        else {
            return abort(403);
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            'category_id' => ['required'],
            'item' => ['required','string', 'min:5', 'max:80'],
            'price' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'image' => ['required', 'image'],
        ]);

        $filename = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('/public/Item/', $filename);

        Item::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'item' => $request->item,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $filename,
        ]);

        return redirect('/dashboard');
    }

    public function delete($id) {
        Item::destroy($id);
        return redirect('/dashboard');
    }
}
