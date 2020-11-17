<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ValidateTask;
use App\User;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('name', 'asc')->get();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateTask $request)
    {
        Task::create($request->all());

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        if (isset($task)) {
            $users = $task->users()->get();

            return view('tasks.view', [
                'task' => $task,
                'users' => $users
            ]);
        } else {
            return redirect()->route('tasks.index')->withErrors(trans('message.task_notfound'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        if (isset($task)) {
            $users = $task->users()->get();
            $usersDontBelongTo = User::all()->diff($users);

            return view('tasks.edit', [
                'task' => $task,
                'users' => $users,
                'usersDontBelongTo' => $usersDontBelongTo
            ]);
        } else {
            return redirect()->route('tasks.index')->withErrors(trans('message.task_notfound'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (isset($task)) {
            if ($request->delete_user) {
                $task->users()->detach($request->delete_user);
            }

            if ($request->add_user) {
                $task->users()->attach($request->add_user);
            }

            if ($request->name) {
                $task->update($request->all());
            }

            return redirect()->route('tasks.edit', ["task" => $task->id]);
        } else {
            return redirect()->route('tasks.index')->withErrors(trans('message.task_notfound'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if (isset($task)) {
            $task->users()->detach();
            $task->delete();
            
            return redirect()->route('tasks.index');
        } else {
            return redirect()->route('tasks.index')->withErrors(trans('message.task_notfound'));
        }
    }
}
