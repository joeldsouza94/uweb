<?php

namespace App\Http\Controllers;

use App\Exceptions\ContentDoesNotBelongToUserException;
use App\Http\Requests\ContentRequest;
use App\Http\Resources\Content\ContentResource;
use App\Model\Content;
use App\Model\Topic;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{
    public function __construct() {
        //$this->middleware('auth')->except('index','show');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Topic $topic)
    {
        //return ContentResource::collection($topic->contents);
        $contents = $topic->contents;
        $added_by = User::find($topic->created_by_user_id);
        $updated_by = User::find($topic->updated_by_user_id);
        $updated_at = $topic->updated_at;
        $updatedcontent = DB::table('contents')->where('topic_id', $topic->id)->latest('updated_at')->first();
        if ($updatedcontent) {
            if ($topic->updated_at < $updatedcontent->updated_at) {
                $updated_by = User::find($updatedcontent->updated_by_user_id);
                $updated_at = $updatedcontent->updated_at;
            }
        }
        return view('topiccontents')->with(compact('contents','topic','added_by','updated_by','updated_at'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Topic $topic)
    {
        return view('contentcreate')->with(compact('topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request, Topic $topic)
    {   
        $content = new Content($request->all());
        $content->created_by_user_id = Auth::id();
        $content->updated_by_user_id = Auth::id();
        $topic->contents()->save($content);
        /*
        return response([
            'data' => new ContentResource($content)
        ], Response::HTTP_CREATED);
        */
        //return redirect()->route('contents.index', $topic);
        return redirect('topics/'.$topic->id.'/contents/'.$content->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show( Topic $topic, Content $content)
    {   
        //return 1;
        $added_by = User::find($content->created_by_user_id);
        $updated_by = User::find($content->updated_by_user_id);
        return view('contentshow')->with(compact('content','added_by','updated_by','topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit( Topic $topic, Content $content)
    {   
        return view('contentedit')->with(compact('content','topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic, Content $content)
    {
        $content->updated_by_user_id = Auth::id();
        $content->update($request->all());
        /*
        return response([
            'data' => new ContentResource($content)
        ], Response::HTTP_CREATED);
        */
        return redirect('topics/'.$topic->id.'/contents/'.$content->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy( Topic $topic, Content $content)
    {
        $this->contentCreatorCheck($content);
        $content->delete();
        /*
        return response(null, Response::HTTP_NO_CONTENT);
        */
        return redirect()->route('contents.index', $topic);
    }

    public function contentCreatorCheck($content) {
        if (Auth::id() != $content->created_by_user_id) {
            throw new ContentDoesNotBelongToUserException;
        }
    }

    public function contentexception() {
        return view('contentexception');
    }
}
