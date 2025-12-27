<?php

namespace App\Services;

use App\Constants\GeneralConstant;
use App\Repositories\EventRepository;

class EventServiceImpl implements EventService
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function createEvent(array $data)
    {
        return $this->eventRepository->create($data);
    }

    public function getAllEvents()
    {
        return $this->eventRepository->getAll();
    }

    public function getAllOpenEvents()
    {
        $criteria = ['status' => GeneralConstant::EVENT_STATUS_PUBLISHED];
        return $this->eventRepository->getWithCriteria($criteria, 'desc', 3);
    }

    public function getEventById(int $id)
    {
        return $this->eventRepository->findById($id);
    }

    public function getEventBySlug(string $slug)
    {
        return $this->eventRepository->findBySlug($slug);
    }

    public function updateEvent(int $id, array $data)
    {
        return $this->eventRepository->update($id, $data);
    }

    public function deleteEvent(int $id)
    {
        return $this->eventRepository->delete($id);
    }
}
