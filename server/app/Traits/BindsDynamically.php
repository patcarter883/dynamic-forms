<?php

namespace App\Traits;

trait BindsDynamically
{
    protected $connection = null;
    protected $collection = null;

    public function bind(string $connection, string $collection)
    {
        $this->setConnection($connection);
        $this->setTable($collection);
    }

    public function newInstance($attributes = [], $exists = false)
    {
        // Overridden in order to allow for late table binding.

        $model = parent::newInstance($attributes, $exists);
        $model->setTable($this->collection);

        return $model;
    }
}
