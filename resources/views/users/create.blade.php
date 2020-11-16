@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('user.newUser')
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ route('users.store') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="user-name" class="col-sm-3 control-label">@lang('user.name')</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="user-name" class="form-control"
                                    value="{{ old('user') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-email" class="col-sm-3 control-label">@lang('user.email')</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" id="user-email" class="form-control"
                                    value="{{ old('user') }}">
                            </div>
                        </div>
                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    @lang('user.addUser')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
