<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class ReciptController extends Controller
{
    public function index(){


        $recipes = Recipe::orderBy('name')->get();

        
        return view('recepeOverview', ['recipes'=>$recipes]);

    }

    public function detail($id){
        $recipe = Recipe::where('id', $id)->first();

        return view('recepeDetail', ['recipe'=>$recipe]);

    }

    public function recepeAdd(){
        
        return view('recepeAdd');

    }

    public function recepeDelete(Request $request){
        
        $recipe = Recipe::where('id', $request->get('id'))->first();


        $recipe->delete();
        
        return redirect("/recipes");

    }


    public function recepeAddPost(Request $request){
        
        // dd($request);
        if($request->get('recepeName') =="") {
            die('no recepe without name');
        }
        $recipe = new Recipe();
        $recipe->name = $request->get('recepeName');
        $recipe->text = $request->get('text');
        $recipe->preperation_time = $request->get('preperationTime');

        $recipe->save();

        return redirect("/recipes");
        // return "Saving: " . $request->get('recepeName');

    }

}
