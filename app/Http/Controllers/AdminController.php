<?php

namespace App\Http\Controllers;

use App\Evenement;
use App\Message;
use App\Product;
use App\Reclamation;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 1)
        {
            $products = Product::all();
            $users = User::where('role', 2)->get();
            return view('admin.index', compact('users', 'products'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function users()
    {
        if(Auth::user()->role == 1)
        {
            $users = User::where('role', 2)->get();
            return view('admin.users', compact('users'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function products()
    {
        if(Auth::user()->role == 1)
        {
            $products = Product::all();
            return view('admin.products', compact('products'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function getAddProduct()
    {
        if(Auth::user()->role == 1)
        {
            return view('admin.addProduct');
        }
        else
        {
            return redirect('/');
        }
    }

    public function postAddProduct(Request $request)
    {
        if(Auth::user()->role == 1)
        {
            $product = new Product();
            $product->name = $request->get('name');
            $product->price = $request->get('price');
            $product->category_id = $request->get('type');
            $product->save();
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $file->move('products', $product->id . '.' . $file->getClientOriginalExtension());
                $product->image = $product->id . '.' . $file->getClientOriginalExtension();
            }
            $product->save();
            return redirect('/admin/products');
        }
        else
        {
            return redirect('/');
        }
    }

    public function getEditProduct($id)
    {
        if(Auth::user()->role == 1)
        {
            $product = Product::find($id);
            return view('admin.editProduct', compact('product'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function postEditProduct(Request $request,$id)
    {
        if(Auth::user()->role == 1)
        {
            $product = Product::find($id);
            $product->name = $request->get('name');
            $product->price = $request->get('price');
            $product->category_id = $request->get('type');
            $product->save();
            if($request->hasFile('image'))
            {
                \File::delete('products/'.$product->id);
                $file = $request->file('image');
                $file->move('products', $product->id . '.' . $file->getClientOriginalExtension());
                $product->image = $product->id . '.' . $file->getClientOriginalExtension();
            }
            $product->save();
            return redirect('/admin/products');
        }
        else
        {
            return redirect('/');
        }
    }

    public function deleteProduct($id)
    {
        if(Auth::user()->role == 1)
        {
            $product = Product::find($id);
            \File::delete('products/'.$product->id);
            $product->delete();
            return redirect('/admin/products');
        }
        else
        {
            return redirect('/');
        }
    }

    public function messages()
    {
        if(Auth::user()->id == 1)
        {
            $messages = Message::all();
            return view('admin.messages', compact('messages'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function deleteMessage($id)
    {
        if(Auth::user()->id == 1)
        {
            $message = Message::find($id);
            $message->delete();
            return redirect('/admin/messages');
        }
        else
        {
            return redirect('/');
        }
    }

    public function reclamations()
    {
        $reclamations = Reclamation::all();
        return view('admin.reclamations',compact('reclamations'));
    }

    public function deleteReclamation($id)
    {
        if(Auth::user()->id == 1)
        {
            $reclamation = Reclamation::find($id);
            $reclamation->delete();
            return redirect('/admin/reclamations');
        }
        else
        {
            return redirect('/');
        }
    }

    public function evenements()
    {
        $evenements = Evenement::all();
        return view('admin.evenements',compact('evenements'));
    }

    public function deleteEvenement($id)
    {
        if(Auth::user()->id == 1)
        {
            $evenement = Evenement::find($id);
            $evenement->delete();
            return redirect('/admin/evenements');
        }
        else
        {
            return redirect('/');
        }
    }

    public function getAddEvenement()
    {
        return view('admin.addEvenement');
    }

    public function postAddEvenement(Request $request)
    {
        $evenement = new Evenement();
        $evenement->title = $request->get('title');
        $evenement->description = $request->get('description');
        $evenement->save();
        return redirect('/admin/evenements');
    }
}
