<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Dog;

class DogController extends Controller
{ 
    public function create(Request $request) 
    { 
        if (Auth::check()) { 
            $request->validate([ 
                'name' => 'required', 
            ]); 
            Dog::create($request->all()); 
        } 
        return redirect()->route('index'); 
    } 
 
    public function delete($id) 
    { 
        if (Auth::check()) { 
            $dog = Dog::find($id); 
            if ($dog) {
                $dog->delete(); 
            }
        } 
 
        return redirect()->route('index'); 
    } 
}
