<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScholarshipController extends Controller
{
    public function index()
    {

        $list = Scholarship::get();
        return view('scholarships.index', compact("list"));
    }
    public function create()
    {
        return view('scholarships.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads'), $imageName);
        $input = $request->all();
        $input["image"] = $imageName;
        $input["status"] = $input["status"] ? 1 : 0;
        $save = Scholarship::create($input);
        if ($save)
            return redirect()->back()->with('success', "Scholarship successfully created");
        return redirect()->back()->with('error', "An error occurred try again");
    }
    public function details($id)
    {

        $data = Scholarship::where('id', $id)->first();
        $list = DB::table('applications AS a')->leftJoin('users As u', 'a.userId', 'u.id')->leftJoin("scholarships AS s", "a.scholarshipId", "s.id")
            ->where("a.scholarshipId", $id)->selectRaw("a.id,title,a.status,u.name,u.email,u.phone,u.lga,u.gender,a.created_at,s.image image,u.image as profile")->get();
        return view('scholarships.details', compact("data", "list"));
    }
    public function Apply(Request $request)
    {
        $check = Application::where('userId', $request->userId)->where('scholarshipId', $request->scholarshipId)->first();
        if ($check)
            return redirect()->back()->with('error', "You have already applied, please check your application status");
        $save = Application::create($request->all());
        if ($save)
            return redirect()->back()->with('success', "You have successfully applied");
        return redirect()->back()->with('error', "An error occurred try again");
    }
    public function application()
    {
        $list = DB::table('applications AS a')->leftJoin('users As u', 'a.userId', 'u.id')->leftJoin("scholarships AS s", "a.scholarshipId", "s.id")
            ->selectRaw("a.id,title,a.status,u.name,u.email,u.phone,u.lga,u.gender,a.created_at,s.image image,u.image as profile")->get();
        return view('scholarships.applications', compact("list"));
    }
    public function Approved($id)
    {
        $save = Application::where("id", $id)->update(["status" => 1]);
        if ($save)
            return redirect()->back()->with('success', "Application approved successfully");
        return redirect()->back()->with('error', "An error occurred try again");
    }
    public function Rejected($id)
    {
        $save = Application::where("id", $id)->update(["status" => 2]);
        if ($save)
            return redirect()->back()->with('success', "Application rejected");
        return redirect()->back()->with('error', "An error occurred try again");
    }
}
