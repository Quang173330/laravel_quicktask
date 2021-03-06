@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('task.list')
                    </div>

                    <div class="panel-body">
                        @include('common.errors')

                        <table class="table table-striped task-table">
                            <thead>
                                <th>@lang('task.task')</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ route('tasks.show', ['task' => $task->id]) }}" method="GET">
                                                <button type="submit" class="btn btn-info">
                                                    <i class="fa fa-btn  fa-eye"></i>@lang('task.view')
                                                </button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ route('tasks.edit', ['task' => $task->id]) }}" method="GET">
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-btn fa-edit"></i>@lang('task.edit')
                                                </button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                                                method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="confirm-button" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>@lang('task.delete')
                                                </button>
                                            </form>
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
