<?php

namespace App\Services;

interface EventService
{
    public function createEvent(array $data);
    public function getAllEvents();
    public function getAllOpenEvents();
    public function getEventById(int $id);
    public function getEventBySlug(string $slug);
    public function updateEvent(int $id, array $data);
    public function deleteEvent(int $id);
}
