<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Auth;

/**
 * Class for Projects
 */
class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * GET: /projects
     */
    public function index($ajax = false)
    {
        $projects = $this->getProjects();
        $viewdata = [
            'projects' => $projects,
        ];

        if ($ajax) return view('projects.partials._index', $viewdata);
        return view('projects.index', $viewdata);
    }

    /**
     * GET: /projects/{project}
     */
    public function show(Project $project, $ajax = false)
    {
        $taskController     = app(TaskController::class);
        $tasksToDo          = $taskController->index($project->id, 'pending');
        $tasksDone          = $taskController->index($project->id, 'done');

        $viewdata = [
            "project"       => $project,
            "tasksDone"     => $tasksDone,
            "tasksToDo"     => $tasksToDo,
        ];
        if ($ajax){
            return view('projects.partials._show', $viewdata);
        }
        return view('projects.show', $viewdata);
    }

    /**
     * GET: /projects/create
     */
    public function create()
    {
        $viewdata = [
            'project' => new Project(),
        ];

        return view('projects.create', $viewdata);
    }

    /**
     * POST: /projects/store
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:projects',
        ]);

        $input   = $request->all();
        $project = $this->createProject($input);

        if (is_null($project)) {
            return back()->withInput($input)->withErrors("Error creating project")
                ->with('flash-type', 'error')
                ->with('flash-message', "Error creating project");
        }

        return redirect('projects/' . $project->id)
            ->with('flash-type', 'success')
            ->with('flash-message', 'Project created');
    }

    /**
     * GET: /projects/{project}/edit
     */
    public function edit(Project $project)
    {
        $viewdata = [
            'project' => $project,
        ];
        return view('projects.edit', $viewdata);
    }

    /**
     * PATCH: /projects/{project}
     */
    public function update(Project $project)
    {
        $request = request();
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $input  = $request->all();

        if (!$this->updateProject($project, $input)) {
            return back()->withInput($input)->withErrors("Error editing project")
                ->with('flash-type', 'error')
                ->with('flash-message', "Error editing project");
        }

        return redirect('projects/' . $project->id)
            ->with('flash-type', 'success')
            ->with('flash-message', 'Project edited');
    }

    /**
     * DELETE: /projects/{project}/delete
     */
    public function delete(Project $project)
    {
        if(!$project->delete()){
            return response()->json([
                'Error'   => 'Error',
                'Message' => 'Error deleting project',
            ]);
        }

        $project = $this->index($project->id, true);
        return $project;
    }

    /**
     * GET: /projects/{project}/delete
     */
    public function deleteGet(Project $project)
    {
        if (!$project->delete()) {
            return back()->withInput($input)->withErrors("Error deleting project")
                ->with('flash-type', 'error')
                ->with('flash-message', "Error deleting project");
        }

        return redirect('projects')
            ->with('flash-type', 'success')
            ->with('flash-message', 'Project deleted');
    }

    /**
     * Create new project
     */
    private function createProject(array $data)
    {
        return Project::create([
            'name' => $data['name'],
        ]);
    }

    /**
     * Update project
     */
    private function updateProject(Project $project, array $data)
    {
        $updateFields = collect($data)->only(Project::fillableFields())->all();
        $project->update($updateFields);
        return $project->save();
    }

    /**
     * Get all projects
     */
    private function getProjects()
    {
        return Project::orderBy('name') ->get();
    }
}
