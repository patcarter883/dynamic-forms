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

    /**
     * Clone the model into a new, non-existing instance.
     *
     * @param  array|null  $except
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function replicate(array $except = null)
    {
        // Overridden in order to allow for late table binding.
        $instance = parent::replicate($except);
        $instance->setTable($this->table);

        return $instance;
    }
}
