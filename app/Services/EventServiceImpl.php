<?php

namespace App\Services;

use App\Constants\GeneralConstant;
use App\Repositories\EventRepository;
use Exception;

class EventServiceImpl implements EventService
{
    protected $repository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->repository = $eventRepository;
    }

    public function createEvent(array $data)
    {
        return $this->repository->create($data);
    }

    public function getAllEvents()
    {
        return $this->repository->getAll();
    }

    public function getAllOpenEvents()
    {
        $criteria = ['status' => GeneralConstant::EVENT_STATUS_PUBLISHED];
        return $this->repository->getWithCriteria($criteria, 'desc', 3);
    }

    public function getEventById(int $id)
    {
        return $this->repository->findById($id);
    }

    public function getEventBySlug(string $slug)
    {
        return $this->repository->findBySlug($slug);
    }

    public function updateEvent(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteEvent(int $id)
    {
        return $this->repository->delete($id);
    }

    public function registerUserToEvent(int $eventId, int $userId)
    {
        $event = $this->repository->findById($eventId);

        if (!$event) {
            throw new Exception('Event not found');
        }

        if ($event->registration_status !== 'OPEN') {
            throw new Exception('Event registration is closed');
        }

        return $this->repository->registerUserToEvent($eventId, $userId);
    }


}
