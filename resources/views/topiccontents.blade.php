@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <table class="table table-striped content-table">

                    <!-- Table heAD -->
                    <thead>
                        <!-- content link -->
                        <th class="table-text">
                            <p style="font-weight: 900;font-size: 200%;">{{ $topic->topic }}</p>
                        </th>

                        <!-- edit Button -->
                        <th>
                            <!-- edit Button -->
                            <a href="{{ url('topics/'.$topic->id.'/edit') }}" class="btn btn-warning">Edit
                            </a>
                        </th>

                        <!-- Delete Button -->
                        <th>
                            <!-- Delete Button -->
                            <form action="{{ url('topics/'.$topic->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" id="delete-topic-{{ $topic->id }}" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Delete
                                </button>
                            </form>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $topic->description }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="panel-body">
                    <p style="font-size: 80%;" class="text-right">-Added by {{ $added_by->name }}<br>
                        -Last updated by {{ $updated_by->name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Contents</b></div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add new content
                        </div>

                        <div class="panel-body">
                            <a href="{{ url('topics/'.$topic->id.'/contents/create') }}" class="btn btn-primary">Create
                            </a>
                        </div>
                    </div>
                    <!-- Current contents -->
                    @if (count($contents) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Current contents
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped content-table">

                                    <!-- Table Headings -->
                                    <thead>
                                        <th>Content</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                        @foreach ($contents as $content)
                                            <tr>
                                                <!-- content link -->
                                                <td class="table-text">
                                                    <a href="{{ url('topics/'.$topic->id.'/contents/'.$content->id) }}" class="btn btn-primary"><b>{{ $content->content }}</b>
                                                    </a>
                                                </td>

                                                <!-- edit Button -->
                                                <td>
                                                    <a href="{{ url('topics/'.$topic->id.'/contents/'.$content->id.'/edit') }}" class="btn btn-warning">Edit
                                                    </a>
                                                </td>

                                                <!-- Delete Button -->
                                                <td>
                                                    <form action="{{ url('topics/'.$topic->id.'/contents/'.$content->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button type="submit" id="delete-content-{{ $content->id }}" class="btn btn-danger">
                                                            <i class="fa fa-btn fa-trash"></i>Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ $content->details }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                No contents!
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
