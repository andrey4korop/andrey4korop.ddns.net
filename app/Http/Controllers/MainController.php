<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function portfolio($page=1){
        $projects = Project::all();
        $data['projects'] = $projects;
        return view('portfolio',$data);
    }
    public function project($id){
        $project = Project::where('id', '=', $id)->get()->first();

        $data['project'] = $project;
        return view('projects',$data);
    }
}
