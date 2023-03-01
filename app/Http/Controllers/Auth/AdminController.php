<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CompanyCategory;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function dashboard()
    {
        $authors = User::role('author')->with('company')->paginate(30);
        $roles = Role::all()->pluck('name');
        $permissions = Permission::all()->pluck('name');
        $rolesHavePermissions = Role::with('permissions')->get();

       

        return view('account.dashboard')->with([
            'companyCategories' => CompanyCategory::all(),
           
        ]);
    }
    public function viewAllUsers()
    {
        $users = User::select('id', 'name', 'email', 'created_at')->latest()->paginate(10);
        return view('account.view-all-users')->with([
            'users' => $users
        ]);
    }

    public function destroyUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if ($user->delete()) {
            Alert::toast('Deleted Successfully!', 'danger');
            return redirect()->route('account.viewAllUsers');
        } else {
            return redirect()->intented('account.viewAllUsers');
        }
    }
}
