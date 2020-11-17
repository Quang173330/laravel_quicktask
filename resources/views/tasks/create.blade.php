@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('task.newTask')
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">@lang('task.name')</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control"
                                    value="{{ old('task') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-description" class="col-sm-3 control-label">@lang('task.description')</label>
                            <div class="col-sm-6">
                                <textarea name="description" id="task-description" class="form-control"
                                    value="{{ old('task') }}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    @lang('task.addTask')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
