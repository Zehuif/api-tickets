<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $events;

    public function __construct(Event $event)
    {
        $this->events = $event;
    }
    
    // public function index()
    // {
    //     return $this->events->getAllEvents();
    // }

    public function store(Request $request)
    {
        return $this->events->storeEvents($request);
    }

    public function show($id)
    {
        return $this->events->getEventById($id);
    }

    public function index()
    {
        return $this->events->getAvailableEvents();
    }
    
    public function update($id)
    {
        return $this->events->updateEventAvailability($id);
    }
}
