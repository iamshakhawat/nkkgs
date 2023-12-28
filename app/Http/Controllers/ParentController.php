<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    public function allParent(){
        $parents = User::where('role','gurdian')->paginate(20);
        return view('backend.parent.all-parents',compact('parents'));
    }

    public function parentProfile($id){
        $parent = User::find($id);
        return view('backend.parent.parent-profile',compact('parent'));
    }

    public function editProfile($id){
        $parent = User::find($id);
        return view('backend.parent.edit-parent-profile',compact('parent'));
    }

    public function moveToTrash(Request $request){
        $id = $request->user_id;
        $dbimage = User::find($id)->photo;
        if ($dbimage != "") {
            $path = public_path('/upload/users') . '/' . $dbimage;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        User::where('id',$id)->forceDelete();
        return redirect()->back()->withIcon('success')->withMessege('Parent Delete Successfull!');
    }

    public function updateParent(Request $request){

        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required|numeric',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg',
            'id' => 'required',
        ]);

        DB::table('users')->where('id', $request->id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'name' => $request->fname.' '.$request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'blood_group' => $request->blood,
        ]);

        if ($request->file('photo')) {
            $dbimage = User::find($request->id)->photo;
            if ($dbimage != "") {
                $path = public_path('/upload/users') . '/' . $dbimage;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $imagename = $request->fname . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/upload/users/'), $imagename);
            DB::table('users')->where('id', $request->id)->update([
                'photo' => $imagename
            ]);
        }
        return redirect()->back()->withIcon('success')->withMessege('Profile Updated Successfully!');
    }

    public function addparent(){
        return view('backend.parent.add-parent');
    }
    public function insertParent(Request $request){
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'gender' => 'required|string',
            'blood' => 'required|string',
            'password' => 'required|min:6|same:confirm_password',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);
        $imagename = null;
        if ($request->file('photo')) {
            $imagename = $request->fname . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/upload/users/'), $imagename);
        }

        $parent = new User();

        $parent->fname = $request->fname;
        $parent->lname = $request->lname;
        $parent->name = $request->fname.' '.$request->lname;
        $parent->email = $request->email;
        $parent->phone = $request->phone;
        $parent->gender = $request->gender;
        $parent->blood_group = $request->blood;
        $parent->password = Hash::make($request->password);
        $parent->photo = $imagename;
        $parent->role = 'gurdian';
        $parent->save();

        return redirect()->route('parent.all')->withIcon('success')->withMessege('Parent Added Successfully!');

    }
}
