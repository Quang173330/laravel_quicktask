@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/task.css') }}" type='text/css'>
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current Tasks -->
            @if ($task)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('task.task')
                    </div>

                    <div class="panel-body">
                        @include('common.errors')

                        <table class="table table-striped task-table" id="table-task">
                            <thead>
                                <th>@lang('task.name')</th>
                                <th>@lang('task.description')</th>
                            </thead>
                            <tbody>
                                <td>
                                    <div>{{ $task->name }}
                                        <div>
                                </td>
                                <td>
                                    <div>{{ $task->description }}</div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-danger" id="button-edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </td>
                            </tbody>
                        </table>
                        <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST" id="form-edit"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">@lang('task.name')</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control"
                                        value="{{ $task->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="task-description"
                                    class="col-sm-3 control-label">@lang('task.description')</label>
                                <div class="col-sm-6">
                                    <textarea name="description" id="task-description" class="form-control"
                                        value="">{{ $task->description }}</textarea>
                                </div>
                            </div>
                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-success">
                                        @lang('task.update')
                                    </button>
                                    <button type="button" class="btn btn-success" id="button-reset">
                                        @lang('task.back')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('user.list')
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>@lang('user.name')</th>
                                <th>@lang('user.email')</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $user->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $user->email }}</div>
                                        </td>
                                        <td>
                                            <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <input type="hidden" name="delete_user" value="{{ $user->id }}">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-user-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="">
                    <button type="button" class="btn btn-success" id="button-add-user">@lang('task.addUser')</button>
                </div>
                <div class="panel panel-default" id="add-user">
                    <div class="panel-heading">
                        @lang('task.addUser')
                    </div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <!-- New Task Form -->
                        <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <!-- Task Name -->
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    @foreach ($usersDontBelongTo as $user)
                                        <div class="form-check">
                                            <input name="add_user[]" class="form-check-input" value="{{ $user->id }}"
                                                type="checkbox" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">{{ $user->name }}</label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-success">
                                        @lang('task.addUser')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/task.js') }}"></script>
@endsection
