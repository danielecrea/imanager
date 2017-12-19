<?php
require_once(__DIR__.'../AbstractHotelManager.php');
class ITCController extends AbstractHotelManager {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel');
<<<<<<< HEAD
        $this->load->model('GCalModel');
=======
        $this->load->model('ICalModel');
        $this->load->model('OctoModel');
>>>>>>> parent of d5c35f0... all the changes for occupancy
        $this->load->helper('url_helper');
        $this->load->library('forecastprices');
        $this->load->model('OctoModel');
    }
    public function getStandardPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId=null)
    {        
        return $this->DatabaseModel->getPrices($from, $to, $priceType, $typeOfUse, $hotelId,$roomId);
    }
    
    public function getActivePrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId=null)
    {        
        if ($priceType == '1'){
            //TODO: RETURN OFFICIAL WEBSITE PRICES
            return $this->DatabaseModel->getPrices($from, $to, $priceType, $typeOfUse, $hotelId,$roomId);
        }
        else if($priceType == '2'){
            return $this->OctoModel->getPrices($from, $to,  $priceType, null, $hotelId, $roomId);
        }
    }

    public function getRooms($hotelId){
        return $this->DatabaseModel->getRooms($hotelId);
    }
    /*
    @return: array of values. These values are the hotel occupancies from $from to $to 
    */
    public function getOccupancy($from, $to,$hotelId, $roomId=null){
        return $this->GCalModel->getOccupancy($from,$to,$hotelId, $roomId);
    }

    public function forecastPrices($from, $to, $priceType, $hotelId, $roomId=null){
        $hotelPrices = array();
        //GET HOTEL OCCUPANCY
        $hotelOccupancies = $this->getOccupancy($from, $to,$hotelId);
        //GET ROOMS
        $rooms = $this->getRooms(1); 
        //For each room and for each type of use (single, double...), we calculate the suggested prices
        foreach ($rooms as $roomeKey => $roomItem) {
            $roomPrices = array();
            for ($typeOfUse=1; $typeOfUse<=$roomItem['capacity']; $typeOfUse++){
                //GET ROOM's STANDARD PRICES PER TYPE OF USE
                $standarPrices = $this->getStandardPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomItem['id']);
                
<<<<<<< HEAD
                //GET REAL ACTUAL PRICES
                $activePricesPerUse = $this->getActivePrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomItem['id']);
                exit(0);
                if (!empty($standarPrices)){
                    //SUGGESTED PRICES PRICES
                    $suggestedPrices = $this->forecastprices->getSuggestedPrices($hotelId,$typeOfUse,$standarPrices,$priceType,$hotelOccupancies);
                    
                    array_push($roomPrices, array($typeOfUse=> array("activePrices" => $activePricesPerUse,"suggestedPrices" => $suggestedPrices)));
                }
            }
            array_push($hotelPrices, array($roomItem['id'] => $roomPrices));
        }
=======
                $hotelOccupancy=null;
                if($priceType == 2){                        
                        $octoRoomId = $this->DatabaseModel->getOctoRoomId($roomItem['id'],$roomItem['Capacity']);                    
                        $pricesPerUse = $this->OctoModel->getPrices($from, $to,  $priceType, $i, $hotelId,$octoRoomId[0]['octorateId']);
                        //echo "<pre>";print_r($pricesPerUse);echo "</pre>";
                    }
                else
                    $pricesPerUse = $this->DatabaseModel->getPrices($from, $to,  $priceType, $i, $hotelId,$roomItem['id']);
                if (!empty($pricesPerUse)){
                    //$newPricesPerUse = $this->forecastprices->getNewPrices($hotelId,$pricesPerUse,$priceType,$hotelOccupancy);
                    //TODO: if pricetype=1 old prices should be the actual price on the official website, if priceType=2 we should get prices from octorate 
                    //array_push($roomPrices, array($i=> array("old prices" => $pricesPerUse,"new prices" => $newPricesPerUse)));
                }
            }
            //array_push($hotelPrices, array($roomItem['Name'] => $roomPrices));
        }
        //$finalArray['oldprices']=$octorate/officialprices;
        //$finalArray['newprices']=$suggestedprices;
        //$finalArray['roomId']['typeofUse']['']
exit;
>>>>>>> parent of d5c35f0... all the changes for occupancy
        return $hotelPrices;//$newPrices;
    }

    public function setPrices($from,$to,$prices,$priceType,$typeOfUse=null,$hotelId, $roomId=null){
        //TODO: if priceType=1 we should set the new prices on the official website, if priceType=2 we should set pices on octorate
    }
}
?>