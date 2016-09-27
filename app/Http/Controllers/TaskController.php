<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\Task;
use Illuminate\Http\Request;

/**
 * Class for Tasks
 */
class TaskController extends Controller
{
    public function __construct()
    {

    }

    /**
     * GET: /tasks
     */
    public function index($projectId = null, $state = '')
    {
        $tasks = $this->getTasks($projectId, $state);
        $viewdata = [
            'tasks' => $tasks,
        ];

        if ($projectId) {
            return view('tasks.partials._index', $viewdata);
        }

        return view('tasks.index', $viewdata);
    }

    /**
     * GET: /tasks/{task}
     */
    public function show(Task $task)
    {
        $viewdata = [
            "task" => $task,
        ];
        return view('tasks.show', $viewdata);
    }

    /**
     * POST: /tasks/store
     */
    public function store(Request $request, Project $project)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $input = $request->all();
        $task = $this->createTask($input, $project);

        if (is_null($task)) {
            return back()->withInput($input)->withErrors("Error creating task")
                ->with('flash-type', 'error')
                ->with('flash-message', "Error creating task");
        }

        return redirect('projects/' . $project->id)
            ->with('flash-type', 'success')
            ->with('flash-message', 'Task created');
    }

    /**
     * GET: /tasks/{task}/edit
     */
    public function edit(Task $task)
    {
        $viewdata = [
            'task' => $task,
        ];
        return view('tasks.edit', $viewdata);
    }

    /**
     * PATCH: /tasks/{task}
     */
    public function update(Task $task)
    {
        $request = request();
        $this->validate($request, [
            'description' => 'required',
        ]);

        $input   = $request->all();

        if (!$this->updateTask($task, $input)) {
            return back()->withInput($input)->withErrors("Error editing task")
                ->with('flash-type', 'error')
                ->with('flash-message', "Error editing task");
        }

        return redirect('projects/' . $task->projectId)
            ->with('flash-type', 'success')
            ->with('flash-message', 'Task edited');
    }

    /**
     * DELETE: /tasks/{task}/delete
     */
    public function delete(Task $task)
    {
        $projectId = $task->projectId;

        if(!$task->delete()){
            return response()->json([
                'Error' => 'Error',
                'Message' => 'An error has occurred',
            ]);
        }
        $taskController     = app(TaskController::class);
        $tasksToDo          = $taskController->index($projectId, 'pending');

        return $tasksToDo;
    }

    /**
     * POST: /tasks/{task}/close
     */
    public function close(Task $task)
    {
        $task->finish_date = date("Y-m-d H:i:s");
        if (!$task->save()) {
            return back()->withInput($input)->withErrors("Error finishing this task")
                ->with('flash-type', 'error')
                ->with('flash-message', "Error finishing this task");
        }

        $projectId         = $task->projectId;
        $projectController = app(ProjectController::class);
        $project           = $projectController->show($task->project, true);

        return $project;
    }

    /**
     * Create new task
     */
    private function createTask(array $data, Project $project)
    {
        return Task::create([
            'description'   => $data['description'],
            'projectId'     => $project->id,
            'create_date'   => date("Y-m-d H:i:s"),
        ]);
    }

    /**
     * Update a task
     */
    private function updateTask(Task $task, array $data)
    {
        $updateFields = collect($data)->only(Task::fillableFields())->all();
        $task->update($updateFields);
        return $task->save();
    }

    /**
     * Get all tasks
     */
    private function getTasks($projectId = '', $state = '')
    {
        if ($projectId){
            $tasks = Task::where('projectId', '=', $projectId);

            if ($state == 'pending')
                $tasks = $tasks->whereNull('finish_date');
            elseif ($state == 'done')
                $tasks = $tasks->whereNotNull('finish_date');
        }

        return $tasks->orderBy('create_date')->get();
    }
}
