<?php

namespace App\repositories\traits;
use Illuminate\Support\Collection;

trait BuildInterval {

    /**
     * @param $intervals
     * @return Collection
     */
    public function buildIntervals($intervals){
        $newCollection = new Collection();

        $intervals->each(function ($item) use ($newCollection){
            $last = $newCollection->last();
            if(!$last){
                $newCollection->push($item);
                return;
            }
            if($this->_dateMod($last->date_end, 1) >= $item->date_start && $last->date_end < $item->date_end){
                if($last->price == $item->price) {
                    $last->date_end = $item->date_end;
                    $newCollection->pop();
                    $newCollection->push($last);
                }else{
                    if(!isset($last->id)){
                        $item->date_start = $this->_dateMod($last->date_end, 1);
                    }else{
                        $last->date_end = $this->_dateMod($item->date_start, -1);
                    }
                    $newCollection->pop();
                    if($last->date_end > $last->date_start) {
                        $newCollection->push($last);
                    }
                    $newCollection->push($item);
                }
            }elseif ($last->date_end < $item->date_end){
                $newCollection->push($item);
            }elseif ($last->price == $item->price){
                if(!isset($item->id)){
                    $newCollection->pop();
                    $last->date_start = $item->date_start;
                    $last->date_end = $item->date_end;
                    $newCollection->push($last);
                }
            }
        });
        return $newCollection;
    }

    /**
     * @param $startIntervals
     * @param $newCollection
     */
    public function saveBuildIntervals($startIntervals, $newCollection){
        $diff = $newCollection->diff($startIntervals);
        $diff2 = $startIntervals->diff($newCollection);
        if($diff->isNotEmpty() || $diff2->isNotEmpty()) {
            $startIntervals->each(function ($item) {
                $item->delete();
            });
            $newCollection->each(function ($item) {
                $item->save();
            });
        }
    }
}
