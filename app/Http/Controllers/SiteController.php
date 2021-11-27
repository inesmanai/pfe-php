<?php

namespace App\Http\Controllers;

use App\Evenement;
use App\Reclamation;
use Illuminate\Http\Request;
use App\Message;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
	{
		return view('site.index');
	}
	
	public function contact()
	{
		return view('site.contact');
	}

	public function produits()
	{
		$products=Product::all();
		return view('site.produits',compact('products'));
	}

	public function portfolio()
	{
		return view('site.quisommenous');
	}

	public function post_contact (Request $request)
	{
	 	$message= new Message();
		$message->name=$request->get('name');
		$message->email=$request->get('email');
		$message->phone=$request->get('phone');
		$message->subject=$request->get('subject');
		$message->message=$request->get('message');
		$message->save();
		return redirect('/contact');
	}

    public function chooseProduct($id)
    {
        $product = Product::find($id);
        return view('site.chooseProduct',compact('product'));
    }

    public function payProduct($id)
    {
        $product = Product::find($id);
        return view('site.payProduct',compact('product'));
    }

    public function postpayProduct($id)
    {
        return redirect('/produits')->with('success', 'Paiement avec succèes');
    }

    public function reclamations()
    {
        $reclamations = Reclamation::where('user_id', Auth::user()->id)->get();
        return view('site.reclamations',compact('reclamations'));
    }

    public function getAddReclamation()
    {
        return view('site.addReclamation');
    }

    public function postAddReclamation(Request $request)
    {
        $reclamation = new Reclamation();
        $reclamation->sujet = $request->get('sujet');
        $reclamation->description = $request->get('description');
        $reclamation->user_id = Auth::user()->id;
        $reclamation->save();
        return redirect('/reclamations');
    }

    public function evenements()
    {
        $evenements = Evenement::all();
        return view('site.evenements',compact('evenements'));
    }
}