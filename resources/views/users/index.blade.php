@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current Tasks -->
            @if (count($users) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('user.list')
                    </div>

                    <div class="panel-body">
                        @include('common.errors')

                        <table class="table table-striped task-table">
                            <thead>
                                <th>@lang('user.name')</th>
                                <th>@lang('user.email')</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
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
                                            <form action="{{ route('users.show', ['user' => $user->id]) }}" method="GET">
                                                <button type="submit" class="btn btn-info">
                                                    <i class="fa fa-btn  fa-eye"></i>@lang('user.view')
                                                </button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ route('users.edit', ['user' => $user->id]) }}" method="GET">
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-btn fa-edit"></i>@lang('user.edit')
                                                </button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>@lang('user.delete')
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
