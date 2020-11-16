@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current Tasks -->
            @if ($user)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('user.user')
                    </div>

                    <div class="panel-body">
                        @include('common.errors')

                        <table class="table table-striped task-table" id="table-user">
                            <thead>
                                <th>@lang('user.name')</th>
                                <th>@lang('user.email')</th>
                            </thead>
                            <tbody>
                                <td>
                                    <div>{{ $user->name }}
                                        <div>
                                </td>
                                <td>
                                    <div>{{ $user->email }}</div>
                                </td>
                                <td><button type="submit" class="btn btn-danger" id="button-edit">
                                        <i class="fa fa-pencil"></i>
                                    </button></td>
                            </tbody>
                        </table>
                        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" id="form-edit"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="user-name" class="col-sm-3 control-label">@lang('user.name')</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" id="user-name" class="form-control"
                                        value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user-email" class="col-sm-3 control-label">@lang('user.email')</label>
                                <div class="col-sm-6">
                                    <textarea name="email" id="user-email" class="form-control"
                                        value="">{{ $user->email }}</textarea>
                                </div>
                            </div>
                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-success">
                                        @lang('user.update')
                                    </button>
                                    <button type="button" class="btn btn-success" id="button-reset">
                                        @lang('user.back')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('task.list')
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>@lang('task.name')</th>
                                <th>@lang('task.description')</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->description }}</div>
                                        </td>
                                        <td>
                                            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <input type="hidden" name="delete_task" value="{{ $task->id }}">
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
                    <button type="button" class="btn btn-success" id="button-add-task">@lang('user.addTask')</button>
                </div>
                <div class="panel panel-default" id="add-task">
                    <div class="panel-heading">
                        @lang('user.addTask')
                    </div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <!-- New Task Form -->
                        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <!-- Task Name -->
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    @foreach ($tasksDontBelongTo as $task)
                                        <div class="form-check">
                                            <input name="add_task[]" class="form-check-input" value="{{ $task->id }}"
                                                type="checkbox" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">{{ $task->name }}</label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-success">
                                        @lang('user.addTask')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
@endsection
