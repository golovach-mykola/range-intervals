<?php

namespace App\contracts;

interface RepositoryInterface{

    /**
     * @param $data
     * @return mixed
     */
    public function push($data);

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $data
     * @return mixed
     */
    public function delete($data);

}