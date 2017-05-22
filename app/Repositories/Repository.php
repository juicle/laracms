<?php

namespace App\Repositories;

/**
 * Class Repository.
 */
abstract class Repository extends BaseRepository
{
    /**
     * @return mixed
     */
    public function getAll($pageSize)
    {
        return $this->query($pageSize);
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->queryAll()->count();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->queryAll()->find($id);
    }
}
