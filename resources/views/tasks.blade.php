@extends('layouts.app')

@section('content')
    <!-- Create Task Form... -->
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        {{ Form::open(['route' => 'task.store']) }}
            <div class="form-group">
                {!! Form::label('name', trans('messages.task'), ['class' => 'col-sm-3 control-label'] ) !!}
                <div class="col-sm-6">
                    {{ Form::text('name', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {!! Form::button(trans('messages.addTask'), ['type' => 'submit', 'class'=>'btn btn-default fa fa-plus']) !!}
                </div>
            </div>
        {{ Form::close() }}
    </div>
    <!-- Current Tasks -->
    @if (count($tasks))
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('messages.currentTask') }}
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>{{ trans('messages.task') }}</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id]]) }}
                                        {{ Form::submit(trans('messages.deleteTask'), [ 'class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <div class="text-center">
        {{ $tasks->links() }}
    </div>
@endsection
