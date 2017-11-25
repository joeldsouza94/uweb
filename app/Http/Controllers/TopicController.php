<?php

namespace App\Http\Controllers;

use App\Exceptions\TopicDoesNotBelongToUserException;
use App\Http\Requests\TopicRequest;
use App\Http\Resources\Topic\TopicCollection;
use App\Http\Resources\Topic\TopicResource;
use App\Model\Topic;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TopicController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$topics = TopicCollection::collection(Topic::paginate(5));
        $topics = Topic::all();
        return view('welcome')->with(compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topiccreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        $topic = new Topic;
        $topic->topic = $request->topic;
        $topic->description = $request->description;
        $topic->created_by_user_id = Auth::id();
        $topic->updated_by_user_id = Auth::id();
        $topic->save();
        /*
        return response([
            'data' => new TopicResource($topic)
        ], Response::HTTP_CREATED);
        */
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return new TopicResource($topic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //return $topic;
        return view('topicedit')->with(compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $topic->updated_by_user_id = Auth::id();
        $topic->update($request->all());
        /*
        return response([
            'data' => new TopicResource($topic)
        ], Response::HTTP_CREATED);
        */
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $this->topicCreatorCheck($topic);
        $topic->delete();
        //return response(null, Response::HTTP_NO_CONTENT);
        return redirect('/');
    }

    public function topicCreatorCheck($topic) {
        if (Auth::id() !== $topic->created_by_user_id) {
            throw new TopicDoesNotBelongToUserException;
        }
    }

    public function topicexception() {
        return view('topicexception');
    }
}
