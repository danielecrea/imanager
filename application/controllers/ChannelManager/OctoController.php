<?php
require_once(__DIR__.'../AbstractChannelManager.php');
require_once(realpath(dirname(__FILE__) . '/..').'../HotelManager/AbstractHotelManager.php');
class OctoController extends AbstractChannelManager {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel');
        $this->load->model('ICalModel');
        $this->load->model('OctoModel');
 //       $this->load->helper('url_helper');
   //     $this->load->library('forecastprices');
 
    }

    public function getPrices($from,$to,$hotelId,$priceType)
    { 
    echo "<br>octCon:mango:$priceType $from $to";       
        if($priceType == 'Octorate')
            return $this->Octorate->getPrices($from, $to,  $priceType, null, $hotelId,null);
        //else
    //        return $this->OctoModel->getPrices($from, $to,  $priceType, null, $hotelId,null);
    }

    public function forecastPrices($from,$to,$priceType,$hotelId,$roomId=null){
        //TODO: if roomId !=null get we should work just on this room 
        $hotelPrices = array();
        $rooms = $this->DatabaseModel->getRooms(null, 1);

        foreach ($rooms as $roomeKey => $roomItem) {
            $roomPrices = array();
            for ($i=1; $i<=$roomItem['Capacity']; $i++){
                
                $hotelOccupancy=null;

                $pricesPerUse = $this->DatabaseModel->getPrices($from, $to,  $priceType, $i, $hotelId,$roomItem['id']);
                if (!empty($pricesPerUse)){
                    $newPricesPerUse = $this->forecastprices->getNewPrices($hotelId,$pricesPerUse,$priceType,$hotelOccupancy);
                    //TODO: if pricetype=1 old prices should be the actual price on the official website, if priceType=2 we should get prices from octorate 
                    array_push($roomPrices, array($i=> array("old prices" => $pricesPerUse,"new prices" => $newPricesPerUse)));
                }
            }
            array_push($hotelPrices, array($roomItem['Name'] => $roomPrices));
        }
        return $hotelPrices;//$newPrices;
    }
    
    public function getOccupancy($from,$to,$hotelId,$roomId=null) {
        //return $this->ICalModel->getOccupancy($from,$to,$hotelId);
    }
    public function setPrices($from,$to,$prices,$priceType,$hotelId,$roomId=null){
        //TODO: if priceType=1 we should set the new prices on the official website, if priceType=2 we should set pices on octorate
    }
}
?>