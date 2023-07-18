<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;


class FrontendController extends Controller
{
    
   



    public function index(){
        $companies=Company::orderBy("name")->get();

        
        $user = session('user');
        // dump($user);

        return view("home", ["user"=>$user,"companies"=>$companies]);
                // dd($companies);
    }



    public function login(Request $request){
        $company=Company::where("email", "=", $request->get('email'))->first();
        if (!$company) {
            return Redirect::back()->withErrors(['msg' => 'Email is wrong']);
        } 
        
        if ($company->password != md5($request->get('password'))) {
            return Redirect::back()->withErrors(['msg' => 'Wrong password']);
        }

        // set the session
        session(['user' => $company]);

       // return Redirect::back();
       return redirect('/');

        $companies=Company::orderBy("name")->get();

        return view("home", ["user"=>$company, "companies"=>$companies]);
                // dd($companies);
    }

    public function logout(Request $request) {
        
        $request->session()->forget('user');
        return redirect('/');
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

    public function getAjaxCompanies(Request $request)
    {

        $companies=Company::where('name', 'LIKE', '%'.$request->get('search').'%')
            ->orderBy("name")            
            ->get();


        // return Response::json(array(
        //     'code'      =>  404,
        //     'message'   =>  "not found"
        // ), 404);


        return $companies->toJson();
    }

    public function postKarma(Request $request) {

        $company=Company::where("id", "=", $request->get('id'))->first();
        if(!$company) {
            die('no such company');
        }
        $value = $request->get('value');
        
        if($value =="+") {
            $company->karma = $company->karma + 1;

        }
        if($value =="-") {
            $company->karma = $company->karma - 1;
            
        }
        $company->save();
        return Response::json(array(
            'code'      =>  200,
            'message'   =>  "ok"
        ), 200);

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
