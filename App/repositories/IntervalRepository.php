<?php


namespace App\repositories;

use App\contracts\RepositoryInterface;
use App\models\Interval;
use App\repositories\traits\BuildInterval;
use App\repositories\traits\FindInterval;

class IntervalRepository implements RepositoryInterface
{
    use BuildInterval; use FindInterval;
    /**
     * @var Interval
     */
    protected $model;

    /**
     * IntervalRepository constructor.
     */
    public function __construct(){
        $this->model = new Interval();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->find();
    }

    /**
     * @param $data
     * @return bool|mixed
     */
    public function push($data){
        $intervals = $this->find($data);
        if($intervals->isEmpty()){
            $this->model->create($data);
        }else{
            $startIntervals = $intervals->sortBy('date_start');
            $intervals->push(new Interval($data));
            $intervals = $intervals->sortBy('date_start');

            $newCollection = $this->buildIntervals($intervals);

            $this->saveBuildIntervals($startIntervals, $newCollection);

        }
        return true;
    }

    /**
     * @param $data
     * @return bool|mixed
     */
    public function delete($data){
        $intervals = $this->find($data);
        if($intervals->isEmpty()){
            return false;
        }
        $rejectIntervals = $intervals->reject(function ($item) use ($data){
            return $item->date_start == $data['date_start'] && $item->date_end == $data['date_end'] && $item->price == $data['price'];
        });
        $newCollection = $this->buildIntervals($rejectIntervals);
        $this->saveBuildIntervals($intervals, $newCollection);
        return true;
    }

    /**
     * @param $date
     * @param int $mod
     * @return false|string
     */
    private function _dateMod($date, $mod = 0){
        return date('Y-m-d H:i:s',strtotime($date) + $mod);
    }

}