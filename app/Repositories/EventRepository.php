<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository
{
    protected Event $event;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getWithCriteria(array $criteria, String $order = 'asc')
    {
        $query = $this->model->newQuery();

        foreach ($criteria as $field => $value) {
            $query->where($field, $value);
        }

        return $query->orderBy('created_at', $order)->get();
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function update(int $id, array $data)
    {
        $event = $this->model->find($id);
        if ($event) {
            $event->update($data);
            return $event;
        }
        return null;
    }

    public function delete(int $id)
    {
        $event = $this->model->find($id);
        if ($event) {
            return $event->delete();
        }
        return false;
    }
}
