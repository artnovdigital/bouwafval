<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;


class FrontendController extends Controller
{
    public function index(){
        $companies=Company::orderBy("name")->get();
        return view("home", ["companies"=>$companies]);
                // dd($companies);
    }

    public function detail($id){
        $company=Company::where("id", "=", $id)->first();
        return view("detail", ["company"=>$company]);
    }

    public function addco(){
        return view("addco");
    }

    public function addcoPost(Request $request){
        // dd($request);
        $company = new Company;
        $company->name = $request->get('companyName');
        $company->email = $request->get('email');
        $company->password = md5($request->get('password'));
        $company->phone = $request->get('phone');
        $company->description = $request->get('companyDescription');
        $company->save();

        $file = $request->file('logo');
        $extension = $request->file('logo')->extension();

        $destinationPath = storage_path() . DIRECTORY_SEPARATOR . "companies";

        $image_name = $company->id . "." . $extension;
        $file->move($destinationPath, $image_name);

        // $upload = Storage::put("companies/" . $company->id . "." . $extension, $file);
        

        $company->logo = "companies/".$image_name;

        //dd($upload);
        $company->save();

        return view("addco");
    }

    public function image($id){
        $waterMarkUrl = public_path('img/watermark.png');
        $company=Company::where("id", "=", $id)->first();
        $manager = new ImageManager(['driver' => 'imagick']);
        $image = $manager->make(public_path() . '/storage/' . $company->logo)
        ->insert($waterMarkUrl, 'center-center', -125, 5)
        ->resize(300, 200)->flip('h');


        return $image->response('jpg', 70);

    }
}
