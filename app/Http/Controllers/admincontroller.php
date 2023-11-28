<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class admincontroller extends Controller
{
    public function getadmin(){
        $admin=admin::all();
        return view('liste-admin',['data1'=>$admin]);
    }

    public function deleteadmin($id){
        $admin=admin::find($id);
        $admin->delete();
        return redirect('/liste-admin')->with('message2','L\'admin '.$admin->nom.' a été bien supprimé');
    }

    public function ajoutadmin(Request $req){
        $req->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'password' => 'required',
            ]);
        $admin = new admin;
        $admin->nom=$req->nom;
        $admin->prenom=$req->prenom;
        $admin->email=$req->email;
        $admin->password=$req->password;
        $admin->save();
        return redirect('/liste-admin')->with('message1','L\'admin '.$admin->nom.' a été bien ajouté');
    }  

    public function getadminid($id){
        $admin = admin::find($id);
        return view('modifier-admin',['data'=>$admin]);
    }

    public function updateadmin(Request $req){
        $admin=admin::find($req->id);
        $admin->nom=$req->nom;
        $admin->prenom=$req->prenom;
        $admin->email=$req->email;
        $admin->password=$req->password;
        $admin->save();
        return redirect('/liste-admin')->with('message0','L\'admin '.$admin->nom.' a été bien modifié');

    }
}
