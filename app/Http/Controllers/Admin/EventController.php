<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;

use App\Models\Event;
use App\Models\User;
use App\Models\Tag;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event :: all();

        return view('welcome', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User :: all();
        $tags = Tag :: all();

        return view('create', compact('users'), compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $newEvent = new Event();

        $user = $data['user_id'];

        $newEvent -> name = $data['name'];
        $newEvent -> description = $data['description'];
        $newEvent -> location = $data['location'];
        $newEvent -> date = $data['date'];

        $newEvent->user() -> associate($user);

        $newEvent -> save();


        return redirect() -> route('event.show', $newEvent -> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User :: all();
        $event = Event :: find($id);

        return view('show', compact('event'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event :: find($id);
        $tags = Tag :: all();

        return view('edit', compact('event'), compact('tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> all();
        $event = Event :: find($id);


        $event -> name = $data['name'];
        $event -> description = $data['description'];
        $event -> location = $data['location'];
        $event -> date = $data['date'];

        $event -> save();

        $event -> tags() -> sync($data['tags']);


        return redirect() -> route('event.show', $event -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event :: find($id);

        $event -> tags() -> detach();
        $event -> delete();
        return redirect()->route('event.welcome');
    }
}
