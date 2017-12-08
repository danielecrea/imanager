<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ForecastPrices {
 	public function getNewPrices($hotelId,$prices,$pricesType,$hotelOccupancy)
    {
        $formula = $this->getFormula($hotelId,$pricesType);
        $newPrices = $this->applyFormula($prices);
        return $newPrices;
    }

    protected function getFormula($hotelId,$pricesType){
        //TODO: implement a way to get a formula to apply per each type of price and hotel.
        $formula = null;
        return $formula;
    }

    protected function applyFormula($prices){
        //TODO: apply the formula for each price
        /*foreach ($prices as $key => $value) {
            # code...
        }*/
        return $prices;
    }
}
?>