<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ForecastPrices {
 	public function getNewPrices($hotelId,$prices,$pricesType,$hotelOccupancy=null)
    {
        //$formula = $this->getFormula($hotelId,$pricesType);
        
        foreach ($prices as $key => &$priceItem) {
            $now = time(); // or your date as well
            $date = strtotime($priceItem['date']);
            $datediff = $date - $now;
            $distance = floor($datediff / (60 * 60 * 24));
            echo "Distance".$distance;
            $hotelOccupacy=0.7;
            $priceItem['price']= $this->applyFormula($hotelOccupacy,$priceItem['price'],$distance);
        }
        
        return $prices;
    }
/*
    protected function getFormula($hotelId,$pricesType){
        //TODO: implement a way to get a formula to apply per each type of price and hotel.
        $formula = null;
        return $formula;
    }
*/
    protected function applyFormula($hotelOccupacy,$price,$distance){
        $sigma = 56.9;
        $mean = 70;
        $pmax = 70;
        $pmin = 40;
        $bean = ( 1 / ($sigma*sqrt(2*pi())))*exp((-pow($distance-$mean,2))/(2*pow($sigma,2)));
        $newPrice = $bean*10000;
        //$newPrice= $basePrice+$hotelOccupacy*$pmax/4-(($distance-F2)%-I2)*$pmax/2;
        echo "<br/>Price:".$price;
        echo "<br/>NewPrice:".$newPrice;
        return $newPrice;
        
    }
}
?>