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

    public function getWithCriteria(array $criteria, String $order = 'asc', Int $limit = null)
    {
        $query = $this->model->newQuery();

        foreach ($criteria as $field => $value) {
            $query->where($field, $value);
        }

        $query->orderBy('created_at', $order);

        if ($limit) {
            $query->limit($limit);
        }

        return $query->get();
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
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
