<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use App\Cv;

use Auth;


class CvController extends Controller
{


    public function __construct() {
        $this->middleware('auth');
   }


    
    public function index(){
      //  $listcv = Cv::where('user_id', Auth::user()->id)->get();
      
          $listcv = Auth::user()->cvs;
        return view('cv.index', ['cvs' =>$listcv]);
    }

    public function create(){
        return view('cv.create');
    }

    public function store(Request $request){
        
        $cv = new Cv();
        $cv->title = $request->input('title');
        $cv->presentation = $request->input('presentation');
        $cv->user_id = Auth::user()->id;

        if($request->hasFile('photo')){
           $path = $request->photo->store('image');
        }

        $cv->photo = $path;


        $cv->save();

        session()->flash('success', 'c bon');

        return redirect('cvs');
        

    }

    public function edit($id){
        $cv = Cv::find($id);

        return view('cv.edit', ['cv' => $cv] );
    }

    public function update(Request $request, $id){
        
        $cv = Cv::find($id);
        $cv->title = $request->input('title');
        $cv->presentation = $request->input('presentation');

        $cv->save();

        return redirect('cvs');
    }




    public function destroy(Request $request, $id){
        
        $cv = Cv::find($id);
        $cv->delete();

        return redirect('cvs'); 
    }



    public function search(Request $request){
        $Search=$request->search;

        $cvs=Cv::where('title','LIKE',"$Search")
        ->take(10)
        ->get();
        return view('cv.index',compact('cvs',$cvs));

    }





}
