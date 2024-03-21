<?php

namespace App\ValueObjects;

// use App\Models\BookRequest;
use App\Models\Car;
use DateTime;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class BookRequest{
    private $location;
    private $pick_up_date;
    private $return_date;

    public function __construct($location, $pick_up_date, $return_date)
    {
        $this->location = $location;
        $this->pick_up_date = $pick_up_date;
        $this->return_date = $return_date;
    }
    public function getData(){
        return array(
            'location' => $this->location,
            'pick_up_data' => $this->pick_up_date,
            'return_data' => $this->return_date
        );
    }
    public function getLocation(){
        return ucfirst($this->location);
    }
    public function getPick_up_date(){
        return $this->pick_up_date;
    }
    public function getReturn_date(){
        return $this->return_date;
    }


    public function calculateDateRange(){
        $pick_up_date = Carbon::parse($this->pick_up_date);
        $return_date = Carbon::parse($this->return_date);
        $timeDiff = ceil(($pick_up_date->diffInHours($return_date))/24);
        return $timeDiff;
     }

     public function datesDisplay() {
        $pick_up_date = Carbon::parse($this->pick_up_date);
        $return_date = Carbon::parse($this->return_date);
        return $pick_up_date->toDayDateTimeString() .  ' - ' .  $return_date->toDayDateTimeString();
        
     }

     public function calculateTotalValue(Car $car){
        $daily_price = $car->daily_price;
        $range = $this->calculateDateRange();       
        return $range * $daily_price;
     }
}