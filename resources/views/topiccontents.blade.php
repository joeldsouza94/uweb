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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New content
                        </div>

                        <div class="panel-body">
                            <form action="{{ url('topics/'.$topic->id.'/contents/create') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('GET') }}

                                <button type="submit" id="create-content" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Create
                                </button>
                            </form>
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
                                        <th>content</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                        @foreach ($contents as $content)
                                            <tr>
                                                <!-- content link -->
                                                <td class="table-text">
                                                    <div><a href="{{ route('contents.index',$content->id) }}">{{ $content->content }}</a></div>
                                                </td>

                                                <!-- edit Button -->
                                                <td>
                                                    <form action="{{ url('topics/'.$topic->id.'/contents/'.$content->id.'/edit') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('GET') }}

                                                        <button type="submit" id="edit-content-{{ $content->id }}" class="btn btn-danger">
                                                            <i class="fa fa-btn fa-trash"></i>Edit
                                                        </button>
                                                    </form>
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
