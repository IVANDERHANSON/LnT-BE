<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\Item;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PHPUnit\TextUI\Configuration\Php;

class InvoiceController extends Controller
{
    public function invoice(Request $request) {
        $user = $request->user();
        if($user->isAdmin == 0) {
            return view('/invoice');
        }
        else {
            return abort(403);
        }
    }

    public function print(Request $request, $id) {
        $user = $request->user();
        $item = Item::findOrFail($id);
        if($user->isAdmin == 0 && $item->quantity > 0) {
            $categories = Category::all();
            return view('printInvoice', compact('item', 'categories'));
        }
        else {
            return abort(403);
        }
    }

    public function saveInvoice(Request $request) {
        $items = Item::all();
        $quantity = NULL;
        foreach($items as $item) {
            if($item->id == $request->item_id) {
                if($request->quantity > $item->quantity) {
                    return "Your request exceeds stock";
                }
                else {
                    $quantity = $item->quantity-$request->quantity;
                }
                break;
            }
        }

        $request->validate([
            'quantity' => ['required', 'integer'],
            'address' => ['required', 'string', 'min:10', 'max:100'],
            'postalCode' => ['required', 'digits:5'],
        ]);

        $request->user()->invoices()->create([
            'category' => $request->category,
            'item' => $request->item,
            'item_id' =>$request->item_id,
            'quantity' => $request->quantity,
            'address' => $request->address,
            'postalCode' => $request->postalCode,
            'price' => $request->price,
            'totalPrice' => $request->totalPrice,
        ]);

        $id = $item->id;
        $category_id = $item->category_id;
        $temp = $item->item;
        $price = $item->price;
        $image = $item->image;

        Item::findOrFail($id)->update([
            'category_id' => $category_id,
            'item' => $temp,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $image,
        ]);

        return redirect('/dashboard');
    }
}
