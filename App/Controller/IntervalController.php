<?php

namespace App\Controller;


use App\repositories\IntervalRepository;

class IntervalController extends MainController {

    protected $repository;

    /**
     * IntervalController constructor.
     */
    public function __construct()
    {
        $this->repository = new IntervalRepository();
        parent::__construct();
    }

    /**
     * @return \App\Engine\Response
     */
    public function get()
    {
        $this->response->content = $this->repository->getAll();
        return $this->response->json();
    }

    /**
     * @return \App\Engine\Response
     */
    public function add(){
        $this->response->content = $this->repository->push($this->request->getAllParam());
        return $this->response->json();
    }

    /**
     * @return \App\Engine\Response
     */
    public function delete(){
        $this->response->content = $this->repository->delete($this->request->getAllParam());
        return $this->response->json();
    }

}