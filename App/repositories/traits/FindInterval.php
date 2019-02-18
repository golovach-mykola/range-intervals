<?php

namespace App\repositories\traits;

trait FindInterval {

    /**
     * @param array $data
     * @return mixed
     */
    public function find($data = []){
        return $this->model
            ->when($data, function ($query) use ($data){
                $query->where(function ($model) use ($data){
                    $model
                        ->where('date_start', '<=', $data['date_start'])
                        ->where('date_end', '>=', $data['date_start']);
                })->orWhere(function ($model) use ($data){
                    $model
                        ->where('date_start', '<=', $this->_dateMod($data['date_end'], 1))
                        ->where('date_end', '>=', $data['date_end']);
                })->orWhere(function ($model) use ($data){
                    $model
                        ->where('date_start', '>=', $data['date_start'])
                        ->where('date_end', '<=', $data['date_end']);
                });
            })
            ->orderBy('date_start')
            ->orderBy('date_end', 'DESC')
            ->orderBy('price')
            ->get();
    }
}
