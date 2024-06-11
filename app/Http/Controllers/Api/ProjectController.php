<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function index(){
        
        $projects = Project::with('technologies', 'type')->paginate(3);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug) {
        $projects = Project::where('slug', '=', $slug)->with('technologies', 'type')->first();
        
        if($projects) {
            $data = [
                'success' => true,
                'projects' => $projects
            ];
        } else {
            $data = [
                'success' => false,
                'error' => 'No project found with this slug'
            ];
        }

        return response()->json($data);
    }
}
