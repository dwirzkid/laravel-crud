<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Staff;

class StaffController extends Controller
{
    public function create(Request $request) 
    { 
        if (Auth::check()) { 
            $request->validate([ 
                'name' => 'required', 
            ]); 
            Staff::create($request->all()); 
        } 
        return redirect()->route('index'); 
    } 
 
    public function delete($id) 
    { 
        if (Auth::check()) { 
            $staff = Staff::find($id); 
            if ($staff) {
                $staff->delete(); 
            }
        } 
 
        return redirect()->route('index'); 
    } 
}
