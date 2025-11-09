<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request) {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location_address' => 'required|string',
            'event_date' => 'required|date',
            'event_url' => 'nullable|url',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('events', 'public');
        }

        Events::create([
            'image_path' => $imagePath,
            'location_address' => $request->location_address,
            'event_date' => $request->event_date,
            'event_url' => $request->event_url,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function destroy($id) {
            $event = Events::findOrFail($id);
            $event->delete();
            return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus!');
        }
}
