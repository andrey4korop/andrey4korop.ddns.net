<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*load models*/
use App\Category;
use App\Project;
class MainController extends Controller
{
    public function index(){
         $projects = Project::with('category')->limit(6)->orderBy('id', 'desc')->get();
         $categorys = Category::all();
        $data['projects'] = $projects;
        $data['categorys'] = $categorys;
        return view('index', $data);
    }
    public function portfolio(){
        $projects = DB::table('projects')->paginate(2);
        $data['projects'] = $projects;
        return view('portfolio',$data);
    }
    public function project($id){
        $project = Project::where('id', '=', $id)->get()->first();

        $data['project'] = $project;
        return view('projects',$data);
    }
}
