<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//return an array with all new prices
class ForecastPrices {
 	public function getSuggestedPrices($hotelId,$typeOfUse,$prices,$pricesType,$hotelOccupancy=null)
    {
        //$formula = $this->getFormula($hotelId,$pricesType);
        
        foreach ($prices as $key => &$priceItem) {
            
            $dateTmp = new DateTime();
            $nowTime = strtotime($dateTmp->format('Y-m-d'));
            

            $dateTime = strtotime($priceItem['date']);

            $datediff = abs($nowTime - $dateTime);

            $distance = floor($datediff / (60 * 60 * 24));

            echo "<br/>Distance: ".$distance."<br/>";
            
            $priceItem['price']= $this->applyFormula(0.8,$priceItem['price'],$distance);
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
        $hotelOccupacy=0.7;
        $bean = ( 1 / ($sigma*sqrt(2*pi())))*exp(-(pow($price-$mean,2))/(2*pow($sigma,2)));
        $newPrice = $bean*10000;
                                   //0   1     2    3    4    5    6   7     8    9     10   11   12     11
        $requiredOccupancy = array(1.00,0.90,0.85,0.80,0.75,0.72,0.70,0.68,0.67,0.66, 0.65, 0.64, 0.63, 0.62);
        /*
        if($distance<20){
            $requiredOccupancy = exp(-(pow($distance,2)/800));
            echo "<br/>RequiredOcc:".$requiredOccupancy;
        }
        */
        $newPrice = $newPrice + $newPrice*($hotelOccupacy - $requiredOccupancy[$distance]);
        echo "<br/>Price:".$price;
        echo "<br/>NewPrice:".$newPrice;
        return $newPrice;
        
    }
}
?>