<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use App\Boutique;
use App\Article;
use App\Categorie;


use Auth;

class BoutiqueController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
   }



   public function index(){
       /*
    $listbt = Boutique::where('user_id', Auth::user()->id)->get();
     foreach ($listbt as $bt){
      $v1 = $bt->id;
      $v2 = $listbt->Nom;  }
      */

    $listbt =Auth::user()->boutique; 
    if($listbt==Null){
        return view('boutique.index2');        
    }
    else{
        $v1 = $listbt->id;
        $v2 = $listbt->Nom;  
        return view('boutique.index', ['v1' =>$v1],['v2' =>$v2]);
    }
    
   }


   public function index2(){
        return view('boutique.index2');        
   }


   public function create(){
    $listbt =Auth::user()->boutique;
    if($listbt==Null)
    {return view('boutique.create');}
    else{
        return redirect()->back()->with('alert', 'Deleted!');
    }
   }


   public function store(Request $request){    
    $bt = new Boutique();
    $bt->Nom = $request->input('Nom');
    $bt->Adresse = $request->input('Adresse');
    $bt->Tel = $request->input('Tel');
    $bt->user_id = Auth::user()->id;

    $user=Auth::user();

    $user->boutique()->save($bt);

    //$bt->save();
    session()->flash('success', 'c bon');
    return redirect('boutique');   
    }


    public function edit($id){
        $bt = Boutique::find($id);


        return view('boutique.edit', ['bt' => $bt] );
    }

    public function update(Request $request, $id){
        
        $bt = Boutique::find($id);
        $bt->Nom = $request->input('Nom');
        $bt->Adresse = $request->input('Adresse');
        $bt->Tel = $request->input('Tel');

        $bt->save();

        return redirect('boutique');
    }

    public function destroy(Request $request, $id){
        
        $bt = Boutique::find($id);
        $bt->delete();

        return redirect('boutique'); 
    }



    public function show($id){

        $bt = Boutique::find($id);
        $v1 = $bt->id;
        $list = $bt->articles;
        return view('boutique.show',  ['v1' => $v1,'bts' =>$list]);
    }



    public function getArticles($id){
       $bt = Boutique::find($id);
       return $bt->articles;
    }



    public function addArticle($id){
        $bt = Boutique::find($id);

        $items = Categorie::all(['id', 'Libelle']);   

        return view('boutique.addarticle', ['bt' => $bt] , compact('items',$items) );
    }


    public function addArticle2(Request $request){

        $ar = new Article();
        $ar->Libelle = $request->input('Libelle');
        $ar->Description = $request->input('Description');
        $ar->Prix = $request->input('Prix');
        $ar->TauRemise = $request->input('TauRemise');
        $ar->TauTva = $request->input('TauTva');
        $ar->boutique_id = $request->boutique_id;
        $ar->categorie_id = $request->item;

        if($request->hasFile('photo')){
            $path = $request->photo->move('image', uniqid().'.jpg');
         }
 
         $ar->photo = $path;

        $ar->user_id = Auth::user()->id;
    
        $ar->save();
        return redirect('boutique/'.$ar->boutique_id.'/show'); 
    }


    public function detailArticle($id){

        $listart = Article::find($id);
        return view('boutique.detailArticle', ['arts' =>$listart]);

    }


    public function autocomplete(Request $request){
        $term=$request->term;
        $data=Article::where('Libelle','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $results=array();
        foreach ($data as $key=> $v ){
            $results[]=['prix' =>$v->Prix,'value'=>$v->Libelle ];
        }
        return response()->json($results);

    }


public function search(Request $request, $id){
    $bt = Boutique::find($id);
    $v1 = $bt->id;
    $Search=$request->search;

    $bts=Article::where('Libelle','LIKE',"$Search")
    ->take(10)
    ->get();
    return view('boutique.show',['v1' => $v1],compact('bts',$bts));


}





}
