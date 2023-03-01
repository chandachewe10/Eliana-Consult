<?php

namespace App\Http\Controllers;

use App\Models\{CompanyCategory,Referals};
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyCategoryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:3'
        ]);
        CompanyCategory::create([
            'category_name' => $request->category_name
        ]);
        Alert::toast('A new Service has been created successfully!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function edit(CompanyCategory $category)
    {
        return view('company-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|min:3'
        ]);
        $category = CompanyCategory::find($id);
        $category->update([
            'category_name' => $request->category_name
        ]);
        Alert::toast('A Service has been updated successfully!!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function destroy($id)
    {
        $category = CompanyCategory::find($id);
        $category->delete();
        Alert::toast('A service has been Deleted!', 'success');
        return redirect()->route('account.dashboard');
    }



    public function approve($id)
    {
        $referal = Referals::findOrFail($id);
        $referal->status = 1;
        $referal->save();
        Alert::toast('Agent Approved Successfully!', 'success');
        return redirect()->route('account.dashboard');
    }




    public function denie($id)
    {
        $referal = Referals::findOrFail($id);
        $referal->delete();
        Alert::toast('Agent Referal Denied Successfully!', 'warning');
        return redirect()->route('account.dashboard');
    }
}
