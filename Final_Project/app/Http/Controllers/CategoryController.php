<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(Request $request) {
        $user = $request->user();
        if($user->isAdmin == 1) {
            return view('/category');
        }
        else {
            return abort(403);
        }
    }

    public function addCategory(Request $request) {
        $request->validate([
            'category' => ['required','string'],
        ]);

        Category::create([
            'category' => $request->category,
        ]);

        return redirect('/dashboard');
    }
}
