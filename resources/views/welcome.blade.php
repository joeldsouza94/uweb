@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Please note that only registered FSTI members will have full access to this knowledge base.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Topics</b></div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Topic
                        </div>

                        <div class="panel-body">
                            <a href="{{ url('topics/create') }}" class="btn btn-primary">Create
                            </a>
                        </div>
                    </div>
                    <!-- Current Topics -->
                    @if (count($topics) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Current Topics
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped topic-table">

                                    <!-- Table Headings -->
                                    <thead>
                                        <th>Topic</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                        @foreach ($topics as $topic)
                                            <tr>
                                                <!-- topic link -->
                                                <td class="table-text">
                                                    <a href="{{ url('topics/'.$topic->id.'/contents') }}" class="btn btn-primary"><b>{{ $topic->topic }}</b>
                                                    </a>
                                                </td>

                                                <!-- edit Button -->
                                                <td>
                                                    <a href="{{ url('topics/'.$topic->id.'/edit') }}" class="btn btn-warning">Edit
                                                    </a>
                                                </td>

                                                <!-- Delete Button -->
                                                <td>
                                                    <form action="{{ url('topics/'.$topic->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button type="submit" id="delete-topic-{{ $topic->id }}" class="btn btn-danger">
                                                            <i class="fa fa-btn fa-trash"></i>Delete
                                                        </button>
                                                    </form>
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
