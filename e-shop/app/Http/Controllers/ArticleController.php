<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use App\Article;

use App\Categorie;
use App\Acheteur;
use Auth;
use Session;

use App\Panier;

class ArticleController extends Controller
{


   public function index(){
       $articles = Article::all();
       return view('welcome')->with('articles', $articles);
   }

    public function vetement(){
        $articles = Article::where('categorie_id', '=', 2)->get();
        return view('vetement')->with('articles', $articles);
    }

    public function livre(){
        $articles = Article::where('categorie_id', '=', 3)->get();
        return view('livre')->with('articles', $articles);
    }

    public function itech(){
        $articles = Article::where('categorie_id', '=', 1)->get();
        return view('itech')->with('articles', $articles);
    }



   public function create(){

    $items = Categorie::all(['id', 'Libelle']);   
    return view('article.create', compact('items',$items));



   // return view('article.create');
   }


   public function store(Request $request){
    
    $ar = new Article();
    $ar->Libelle = $request->input('Libelle');
    $ar->Description = $request->input('Description');
    $ar->Prix = $request->input('Prix');
    $ar->TauRemise = $request->input('TauRemise');
    $ar->TauTva = $request->input('TauTva');
    $ar->boutique_id = $request->input('boutique_id');
    $ar->categorie_id = $request->input('categorie_id');
    $ar->user_id = Auth::user()->id;

    $ar->save();
    session()->flash('success', 'c bon');
    return redirect('article');   
    }

    public function edit($id){
        $ar = Article::find($id);

        return view('article.edit', ['ar' => $ar] );
    }

    public function update(Request $request, $id){
        
        $ar = Article::find($id);
        $ar->Libelle = $request->input('Libelle');
        $ar->Description = $request->input('Description');
        $ar->Prix = $request->input('Prix');
        $ar->TauRemise = $request->input('TauRemise');
        $ar->TauTva = $request->input('TauTva');
        $ar->boutique_id = $request->input('boutique_id');
        $ar->categorie_id = $request->input('categorie_id');
        
        $ar->save();

        return redirect('article');
    }

    public function destroy(Request $request, $id){
        
        $ar = Article::find($id);
        $ar->delete();

        return redirect('article'); 
    }

    public function index1(){
        $articles = Article::orderBy('created_at', 'desc')->paginate(2);
        return view('shop.index')->with('articles', $articles);
    }

    public function addItem($id){
        $article = Article::find($id);
        $currentCart = Session::has('panier') ? Session::get('panier') : null;
        $panier = new Panier($currentCart);
        $panier->add($article->id, $article);

        Session::put('panier', $panier);
        Session::save();
        return redirect()->route('article.index')->with('success', 'Nouvel article ajouté au panier!');

    }


    public function addItem1($id){
        $article = Article::find($id);
        $currentCart = Session::has('panier') ? Session::get('panier') : null;
        $panier = new Panier($currentCart);
        $panier->add($article->id, $article);

        Session::put('panier', $panier);
        Session::save();
        return redirect()->route('article.vetement')->with('success', 'Nouvel article ajouté au panier!');

    }

    public function getCart(){

        if(Auth::guest()){
            $currentCart = Session::has('panier') ? Session::get('panier') : null;
            $cart = new Panier($currentCart);

            return view('shop.panier')->with(['items' => $cart->items, 'totalP' => $cart->totalP]);
        }

        $currentCart = Session::has('panier') ? Session::get('panier') : null;
        $cart = new Panier($currentCart);

        return view('shop.panier')->with(['items' => $cart->items, 'totalP' => $cart->totalP]);
    }


    public function getCheckout(){
        if(Auth::guest() || !Session::has('panier')){
            return redirect()->route('article.index')->with('error', 'Merci de vous connecter');
        }

        return view('shop.checkout');
    }

    public function postCheckout(){
        if(Auth::guest() || !Session::has('panier')){
            return redirect()->route('article.index')->with('error', 'Merci de vous connecter');
        }

        $totalP = Session::get('panier')->totalP * 100;
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys


        $cart = Session::get('panier');

        $acheteur = new Acheteur();
        $acheteur->panier = serialize($cart);

        Auth::user()->acheteurs()->save($acheteur);

        Session::forget('panier');

        return redirect()->route('article.index')->with('success', 'Merci de votre commande!');
    }

    public function reduceByOne($id){
        $currentCart = Session::has('panier') ? Session::get('panier') : null;
        $panier = new Panier($currentCart);
        $panier->reduceByOne($id);

        Session::put('panier', $panier);
        Session::save();

        if(count($panier->items) <= 0){
            Session::forget('panier');
        }

        return redirect()->route('article.panier')->with('success', 'L\'article a bien été supprimé du panier');
    }

    public function deleteProduct($id){
        $currentCart = Session::has('panier') ? Session::get('panier') : null;
        $panier = new Panier($currentCart);
        $panier->delete($id);

        Session::put('panier', $panier);
        Session::save();

        if(count($panier->items) <= 0){
            Session::forget('panier');
        }

        return redirect()->route('article.panier')->with('success', 'Les articles ont bien été supprimé du panier');
    }




}
