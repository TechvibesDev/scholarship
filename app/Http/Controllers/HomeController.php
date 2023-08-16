<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == '100') {
            $users = DB::table("users")->where("role", "200")->count();
            $scholarships = DB::table("scholarships")->count();
            $applications = DB::table("applications")->count();
            return view('index', compact("users", "scholarships", "applications"));
        } else {
            $data = User::where('id', auth()->user()->id)->first();
            return view('students.index', compact('data'));
        }
    }
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|unique:users,email,' . $request->id,
            'phone' => 'required|unique:users,phone,' . $request->id,
        ], [
            'email.unique' => 'Email address already exists.',
            'phone.unique' => 'Phone number already exists.',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('profile'), $imageName);
        $input = $request->all();
        $input["image"] = $imageName;
        unset($input["_token"]);
        $update = User::where('id', $request->id)->update($input);
        if ($update)
            return redirect()->back()->with('success', "Record successfully updated");
        return redirect()->back()->with('error', "An error occurred try again");
    }
}
