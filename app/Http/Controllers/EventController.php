<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $search = request("search");

        if ($search) {

            $events = Event::where([
                ["title", "like", "%".$search."%"]
            ])->get();

        } else {
            $events = Event::all();
        }

        return view('home', compact("events", "search"));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event;

        $event->title       = $request->title;
        $event->description = $request->description;
        $event->city        = $request->city;
        $event->private     = $request->private;

        if($request->hasFile("image") && $request->file("image")->isValid()) {

            $requestImage = $request->image;

            $extension    = $requestImage->extension();
            $imageName    = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path("img/events"), $imageName);

            $event->image = $imageName;
        }

        $event->user_id = auth()->user()->id;

        $event->save();

        return redirect("/")
                ->with("msg", "Evento criado com sucesso!");
    }
}
