<?php
require_once(__DIR__.'../AbstractHotelManager.php');
require_once(realpath(dirname(__FILE__) . '/..').'/ChannelManager/AbstractChannelManager.php');
class ITCController extends AbstractHotelManager {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel');
        $this->load->model('GCalModel');
        $this->load->model('OctoModel');
        $this->load->helper('url_helper');
        $this->load->library('forecastprices');
        //$this->load->library('googleclient');
    }

    public function getPrices($from,$to,$hotelId,$priceType)
    {        
    //    if($priceType == 'Octorate')
      //      return $this->Octorate->getPrices($from, $to,  $priceType, null, $hotelId,null);
        //else
            return $this->DatabaseModel->getPrices($from, $to,  $priceType, null, $hotelId,null);
    }

    public function forecastPrices($from,$to,$priceType,$hotelId,$roomId=null,$typeOfUse=null){
        //TODO: if roomId !=null get we should work just on this room 
        $hotelPrices = array();
        $rooms = $this->DatabaseModel->getRooms(null, 1);
        foreach ($rooms as $roomeKey => $roomItem) {
            $roomPrices = array();
            for ($i=1; $i<=$roomItem['Capacity']; $i++){
                
                //$hotelOccupancy=null;
                $hotelOccupancy=$this->GCalModel->getOccupancy($from,$to,$hotelId);
                echo "<br>occ<pre>";print_r($hotelOccupancy);echo "</pre>";
                if($priceType == 2){                        
                        $octoRoomId = $this->DatabaseModel->getOctoRoomId($roomItem['id'],$roomItem['Capacity']);                    
                        $pricesPerUse = $this->OctoModel->getPrices($from, $to,  $priceType, $i, $hotelId,$octoRoomId[0]['octorateId'],$octoRoomId[0]['typeOfUse']);                
                    }
                else
                    $pricesPerUse = $this->DatabaseModel->getPrices($from, $to,  $priceType, $i, $hotelId,$roomItem['id']);
                    echo "<pre>";print_r($pricesPerUse);echo "</pre>";
                if (!empty($pricesPerUse)){
                    $newPricesPerUse = $this->forecastprices->getNewPrices($hotelId,$pricesPerUse,$priceType,$hotelOccupancy);
                    //TODO: if pricetype=1 old prices should be the actual price on the official website, if priceType=2 we should get prices from octorate 
                    array_push($roomPrices, array($i=> array("old prices" => $pricesPerUse,"new prices" => $newPricesPerUse)));
                }
            }
            array_push($hotelPrices, array($roomItem['Name'] => $roomPrices));
        }
        //$finalArray['oldprices']=$octorate/officialprices;
        //$finalArray['newprices']=$suggestedprices;
        //$finalArray['roomId']['typeofUse']['']
        return $hotelPrices;//$newPrices;
    }
    
    public function getOccupancy($from,$to,$hotelId,$roomId=null) {
        return $this->ICalModel->getOccupancy($from,$to,$hotelId);
    }
    public function setPrices($from,$to,$prices,$priceType,$hotelId,$roomId=null){
        //TODO: if priceType=1 we should set the new prices on the official website, if priceType=2 we should set pices on octorate
    }
}
?>