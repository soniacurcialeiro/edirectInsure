<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

/**
 * Class for HomePage
 */
class HomeController extends Controller
{
    public function __construct()
    {

    }

    /**
     * GET: /
     */
    public function index()
    {
        $projectController = app(ProjectController::class);
        $projects          = $projectController->index(true);

        $viewdata = [
            'projects' => $projects,
        ];

        return view('home', $viewdata);
    }
}
