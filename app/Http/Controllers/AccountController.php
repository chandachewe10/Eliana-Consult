<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\files;
use App\Models\file_items;
use App\Models\Referals;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('account.user-account');
    }

    public function referSomeoneView()
    {
        return view('account.refer-someone');
    }

    public function referSomeone(Request $request)
    {

        $request->validate([
            'client_name' => 'required|string',
            'client_email' => 'required|email|unique:referals',
            'client_phone' => 'required|numeric',
            'client_address' => 'required|string',
            'client_required_service' => 'required|string',
            'attachment' => 'nullable|mimes:pdf,jpg,png,docx|max:5120', //Maximum file size to be 5MB
        ]);

        

        $user = new Referals;
        $user->user_id = Auth::user()->id;
        $user->client_name = $request->client_name;  
        $user->client_email = $request->client_email; 
        $user->client_phone = $request->client_phone; 
        $user->client_address = $request->client_address; 
        $user->client_required_service = $request->client_required_service; 
        if($request->hasFile('attachment')){
            $file = $request->file('attachment');
            $filename = $file->store('referal_attachments');  
            $user->attachment = $filename; 
        }
       $user->save(); 
       Alert::toast('Your referal has been submitted successfully!', 'success');
       return redirect()->back();
    }

    public function applyJobView(Request $request)
    {
        if ($this->hasApplied(auth()->user(), $request->post_id)) {
            Alert::toast('You have already applied for this job!', 'success');
            return redirect()->route('post.show', ['job' => $request->post_id]);
        } elseif (!auth()->user()->hasRole('user')) {
            Alert::toast('You are a employer! You can\'t apply for the job! ', 'error');
            return redirect()->route('post.show', ['job' => $request->post_id]);
        }

        $post = Post::find($request->post_id);
        $company = $post->company()->first();
        return view('account.apply-job', compact('post', 'company'));
    }

    public function applyJob(Request $request)
    {
        $application = new JobApplication();
        $user = User::find(auth()->user()->id);

        if ($this->hasApplied($user, $request->post_id)) {
            Alert::toast('You have already applied for this job!', 'success');
            return redirect()->route('post.show', ['job' => $request->post_id]);
        }

        $application->user_id = auth()->user()->id;
        $application->post_id = $request->post_id;
        $application->save();
        Alert::toast('Thank you for applying! Wait for the company to respond!', 'success');
        return redirect()->route('post.show', ['job' => $request->post_id]);
    }

    public function changePasswordView()
    {
        return view('account.change-password');
    }

    public function changePassword(Request $request)
    {
        if (!auth()->user()) {
            Alert::toast('Not authenticated!', 'success');
            return redirect()->back();
        }

        //check if the password is valid
        $request->validate([
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8'
        ]);

        $authUser = auth()->user();
        $currentP = $request->current_password;
        $newP = $request->new_password;
        $confirmP = $request->confirm_password;

        if (Hash::check($currentP, $authUser->password)) {
            if (Str::of($newP)->exactly($confirmP)) {
                $user = User::find($authUser->id);
                $user->password = Hash::make($newP);
                if ($user->save()) {
                    Alert::toast('Password Changed!', 'success');
                    return redirect()->route('account.index');
                } else {
                    Alert::toast('Something went wrong!', 'warning');
                }
            } else {
                Alert::toast('Passwords do not match!', 'info');
            }
        } else {
            Alert::toast('Incorrect Password!', 'info');
        }
        return redirect()->back();
    }


    public function uploadQualificationsView()
    {
        return view('account.uploadQualificationsView');
    }


    public function uploadQualifications(Request $request)
    {
        if ($request->hasFile('filename')) {
            $allowedfileExtension=['pdf','docx'];
            $files = $request->file('filename');
            foreach ($files as $file) {
               
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();

                $check=in_array($extension, $allowedfileExtension);

                if ($check) {
                    $items= files::create([
                        $request->status_upload
                    ]);
                    
                        $filename = $file->store('qualifications');
                        file_items::create([
                        'file_id' => $items->id,
                        'filename' => $filename
                        ]);
                  
                    
                }

                elseif(!$check){
                    Alert::toast('Something went wrong! Invalid File Format', 'warning');
                    return redirect()->back();
                }
               
            }
            
    Alert::toast('All files uploaded successfully!', 'success');
    return redirect()->back();

        }
    }




    public function checkReferal()
    {
       
            return view('account.added-referals',[
             'referals' => Referals::latest()->get()  
            ]);
        }
    





    public function deactivateView()
    {
        return view('account.deactivate');
    }

    public function deleteAccount()
    {
        $user = User::find(auth()->user()->id);
        Auth::logout($user->id);
        if ($user->delete()) {
            Alert::toast('Your account was deleted successfully!', 'info');
            return redirect(route('post.index'));
        } else {
            return view('account.deactivate');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    protected function hasApplied($user, $postId)
    {
        $applied = $user->applied()->where('post_id', $postId)->get();
        if ($applied->count()) {
            return true;
        } else {
            return false;
        }
    }
}
