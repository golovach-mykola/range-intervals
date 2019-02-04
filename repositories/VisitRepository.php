<?php


namespace repositories;

use models\Visit;

class VisitRepository
{
    /**
     * @var Visit
     */
    protected $model;
    /**
     * @var array
     */
    protected $params;

    public function __construct(Visit $model, $params){
        $this->model = $model;
        $this->params = $params;
    }

    public function __get($key){
        return $this->params[$key];
    }

    public function pushVisit(){
        $this->save($this->find());
    }

    private function find(){
        return $this->model
            ->where('ip_address', $this->ip_address)
            ->where('user_agent', $this->user_agent)
            ->where('page_url', $this->page_url)
            ->first();
    }

    private function save($model){
        if($model){
            $model->views_count++;
            $model->view_date = date('Y-m-d H:i:s');
            $model->save();
        }else{
            $this->model->create($this->params);
        }
    }

}