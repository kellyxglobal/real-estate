<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    } //End Method

    public function AdminLogout(Request $request){
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('admin/admin_login');
        }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    } // End Method

    public function AdminProfile(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));

     }// End Method 
}
