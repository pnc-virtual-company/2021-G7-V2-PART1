<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllEvent()
    {
        return Event::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createEvent(Request $request)
    {
        $request->validate([
            'eventName'  => 'required|max:50',
            'start_date' => 'required|date|date_format:Y-m-d',
            'end_date'   => 'required|date|date_format:Y-m-d',
            'image'      => 'image|mimes:jpg,jpeg,png,gif|max:1999',
            'description'=> 'required|max:150',

        ]);
        //move image to storage
        $request->file('image')->store('public/images');

        // get orignal name 
        $orignal = $request->file('image')->getClientOriginalName();

        // get image size
        $size = $request->file('image')->getSize();

        $event = new Event();
        $event->eventName = $request->eventName;
        $event->start_date = $request->start_date;
        $event->end_date   = $request->end_date;
        $event->city       = $request->city;
        $event->country    = $request->country;
        $event->participants = $request->participants;
        $event->description  = $request->description;
        $event->image        = $request->file('image')->hashName();
        $event->orginal = $orignal;
        $event->size = $size;
        $event->save();

        return response()->json(['message' => 'Event created successfully!'], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eventId($id)
    {
        return Event::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'eventName'  => 'required|max:50',
            'start_date' => 'required|date|date_format:Y-m-d',
            'end_date'   => 'required|date|date_format:Y-m-d',
            'image'      => 'image|mimes:jpg,jpeg,png,gif|max:1999',
            'description'=> 'required|max:150',

        ]);
        //move image to storage
        $request->file('image')->store('public/images');

        // get orignal name 
        $orignal = $request->file('image')->getClientOriginalName();

        // get image size
        $size = $request->file('image')->getSize();

        $event = new Event();
        $event->eventName = $request->eventName;
        $event->start_date = $request->start_date;
        $event->end_date   = $request->end_date;
        $event->city       = $request->city;
        $event->country    = $request->country;
        $event->participants = $request->participants;
        $event->description  = $request->description;
        $event->image        = $request->file('image')->hashName();
        $event->orginal = $orignal;
        $event->size = $size;
        $event->save();

        return response()->json(['message' => 'Event updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEvent($id)
    {
        $iSDelete = Event::destroy($id);
        if ($iSDelete ===1) {
            return response()->json(['message' => 'Event deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Event cannot delete'], 404);
        }
    }

    /**
     * search event name
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function search($eventName)
    {
        return Event::where('eventName','like','%'.$eventName.'%')->get();
    }
}
