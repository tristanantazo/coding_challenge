<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function getCalendar() {
        $calendar = Event::find(1);
        $calendar->days = json_decode($calendar->days);
        return $calendar;
    }

    public function updateCalendar(Request $request) {
        $calendar = Event::find(1);
        $calendar->days = json_decode($calendar->days);
        foreach ($request->days as $key => $day) {
            $v = $day['id'];
            $calendar->days->$v = $day['value'];
        }
        $calendar->days = json_encode($calendar->days);
        $calendar->event_title = $request->event_title;
        $calendar->from = $request->date['from'];
        $calendar->to = $request->date['to'];
        $calendar->save();

        return 'ok';
    }
}
