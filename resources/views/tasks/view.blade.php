@extends('layouts.app')

@section('content')
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

                        <table class="table table-striped task-table">
                            <thead>
                                <th>@lang('task.name')</th>
                                <th>@lang('task.description')</th>
                            </thead>
                            <tbody>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->description }}</td>
                            </tbody>
                        </table>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
