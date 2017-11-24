@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                    <!-- Current Topics -->
                    @if (count($topics) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Current Tasks
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped task-table">

                                    <!-- Table Headings -->
                                    <thead>
                                        <th>Task</th>
                                        <th>&nbsp;</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                        @foreach ($topics as $topic)
                                            <tr>
                                                <!-- Task Name -->
                                                <td class="table-text">
                                                    <div><a href="{{ route('contents.index',$topic->id) }}">{{ $topic->topic }}</a></div>
                                                </td>

                                                <td>
                                                    <!-- TODO: Delete Button -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                No topics!
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
