<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class ReciptController extends Controller
{
    public function index(){


        $recipes = Recipe::orderBy('id')->get();

        
        return view('recepeOverview', ['recipes'=>$recipes]);

    }

    public function detail($id){
        $recipe = Recipe::where('id', $id)->first();

        return view('recepeDetail', ['recipe'=>$recipe]);

    }
}
