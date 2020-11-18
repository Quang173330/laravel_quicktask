<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ValidateUser;
use Throwable;
use App\Task;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateUser $request)
    {
        try {
            User::create($request->all());
        } catch (Throwable $th) {
            return redirect()->route('users.create')
                ->withInput()
                ->withErrors($th->getMessage());
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (isset($user)) {
            $tasks = $user->tasks()->get();

            return view('users.view', [
                'user' => $user,
                'tasks' => $tasks,
            ]);
        } else {
            return redirect()->route('users.index')->withErrors(trans('message.user_notfound'));
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
        $user = User::find($id);

        if (isset($user)) {
            $tasks = $user->tasks()->get();
            $tasksDontBelongTo = Task::all()->diff($tasks);

            return view('users.edit', [
                'user' => $user,
                'tasks' => $tasks,
                'tasksDontBelongTo' => $tasksDontBelongTo,
            ]);
        } else {
            return redirect()->route('users.index')->withErrors(trans('message.user_notfound'));
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
        $user = User::find($id);
        if (isset($user)) {
            if ($request->delete_task) {
                $user->tasks()->detach($request->delete_task);
            }

            if ($request->add_task) {
                $user->tasks()->attach($request->add_task);
            }

            if ($request->name) {
                $user->update($request->all());
            }

            return redirect()->route('users.edit', ["user" => $user->id]);
        } else {
            return redirect()->route('users.index')->withErrors(trans('message.user_notfound'));
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
        $user = User::find($id);
        if (isset($user)) {
            $user->tasks()->detach();
            $user->delete();

            return redirect()->route('users.index');
        } else {
            return redirect()->route('users.index')->withErrors(trans('message.user_notfound'));
        }
    }
}
