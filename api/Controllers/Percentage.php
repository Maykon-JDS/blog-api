<?php

namespace Controllers;

use stdClass;

class Percentage extends Controller {

    public function percentage($pathPaths, $queryParameters){

        $percent = 0;

        extract($queryParameters);

        $data = new stdClass();

        $data->porcentage = $percent / 100;

        $this->returnJson($data);

    }

    public function simpleInterest ($pathPaths, $queryParameters){

        $capital = 0;

        $tax = 0;

        $period = 0;

        extract($queryParameters);

        $data = new stdClass();

        $data->capital =(double) $capital;

        $data->tax = (double) $tax;

        $data->period = (double) $period;

        $data->simpleInterest = $capital * ($tax / 100) * $period;

        $data->finalCapital = $capital + $data->simpleInterest;

        $this->returnJson($data);

    }

    public function compoundInterest ($pathPaths, $queryParameters){

        $capital = 0;

        $tax = 0;

        $period = 0;

        extract($queryParameters);

        $data = new stdClass();

        $data->capital = (double) $capital;

        $data->tax = (double) $tax;

        $data->period = (double) $period;

        $data->amount = $capital * (1 + ($tax / 100))**$period;

        $this->returnJson($data);

    }

    public function percentageIncrease ($pathPaths, $queryParameters){

        $initialValue = 0;

        $percentageIncrease = 0;

        $finalValue = 0;

        $precision = 2;

        extract($queryParameters);

        $data = new stdClass();

        $data->initialValue = (double) $initialValue;

        $data->percentageIncrease = (double) $percentageIncrease;

        if ($initialValue > 0 && $percentageIncrease > 0 && $finalValue == 0){

            $data->finalValue = round(($initialValue * (1 + ($percentageIncrease / 100))), $precision);

        }
        else if($initialValue > 0 && $finalValue > 0 && $percentageIncrease == 0){

            $data->finalValue = (double) $finalValue;

            $data->percentageIncrease = round(((($finalValue / $initialValue) - 1) * 100), $precision);

        }


        $this->returnJson($data);

    }

    public function percentageDecrease ($pathPaths, $queryParameters){

        $initialValue = 0;

        $percentageDecrease = 0;

        extract($queryParameters);

        $data = new stdClass();

        $data->initialValue = (double) $initialValue;

        $data->percentageDecrease = (double) $percentageDecrease;

        $data->finalValue = $initialValue * (1 - ($percentageDecrease / 100));

        $this->returnJson($data);

    }


    public function successiveEqualPercentageIncreases ($pathPaths, $queryParameters){

        $initialValue = 0;

        $percentageIncrease = 0;

        $amountAdditions = 0;

        extract($queryParameters);

        $data = new stdClass();

        $data->initialValue = (double) $initialValue;

        $data->percentageIncrease = (double) $percentageIncrease;

        $data->amountAdditions = (double) $amountAdditions;

        $data->finalValue = $initialValue * (1 + ($percentageIncrease / 100))**$amountAdditions;

        $this->returnJson($data);

    }

    public function successiveEqualPercentageDecreases ($pathPaths, $queryParameters){

        $initialValue = 0;

        $percentageDecrease = 0;

        $amountDecrease = 0;

        extract($queryParameters);

        $data = new stdClass();

        $data->initialValue = (double) $initialValue;

        $data->percentageDecrease = (double) $percentageDecrease;

        $data->amountDecrease = (double) $amountDecrease;

        $data->finalValue = $initialValue * (1 - ($percentageDecrease / 100))**$amountDecrease;

        $this->returnJson($data);

    }

}