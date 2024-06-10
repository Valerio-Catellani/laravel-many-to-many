<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        // $projects = Project::paginate(3);
        return response()->json(
            [
                'success' => true,
                'results' => $projects
            ]
        );
    }
    public function show($id)
    {
        $project = Project::where('id', $id)->with('type', 'technologies')->first();
        return response()->json(
            [
                'success' => true,
                'results' => $project
            ]
        );
    }
}
//vueflux