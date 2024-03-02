<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;

use App\Models\Event;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('welcome', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $tags = Tag::all();

        return view('create', compact('users', 'tags'));
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

        $newEvent = new Event;

        $auth = new Auth();
        $auth = Auth::user()->id;
        $user = $auth;

        $newEvent->name = $data['name'];
        $newEvent->description = $data['description'];
        $newEvent->location = $data['location'];
        $newEvent->date = $data['date'];

        $newEvent->user()->associate($user);

        $newEvent->save();

        $newEvent->tags()->attach($data['tags']);

        return redirect()->route('event.show', $newEvent->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id); // Trova l'evento con l'id fornito
        $user = $event->user; // Ottieni l'utente organizzatore dell'evento tramite la relazione definita

        return view('show', compact('event', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $tags = Tag::all();

        return view('edit', compact('event', 'tags'));
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
        $data = $request->all();
        $event = Event::find($id);


        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->location = $data['location'];
        $event->date = $data['date'];

        $event->save();

        $event->tags()->sync($data['tags']);


        return redirect()->route('event.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->tags()->detach();
        $event->delete();
        return redirect()->route('event.welcome');
    }
}
