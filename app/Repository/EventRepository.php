<?php


namespace App\Repository;
use App\Models\Event;

class EventRepository
{
    /**
     * @var Event
     */
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function all()
    {
        $event = $this->event->orderBy('id', 'ASC')->get();
        return $event;
    }

    public function findById($id)
    {
        $event = $this->event->find($id);
        return $event;
    }

}
