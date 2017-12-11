<?php
require_once(__DIR__.'../AbstractHotelManager.php');
class ITCController extends AbstractHotelManager {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel');
        $this->load->model('ICalModel');
        $this->load->helper('url_helper');
        $this->load->library('forecastprices');
        //$this->load->library('googleclient');
    }
    public function getPrices($from,$to,$hotelId,$priceType)
    {        
        return $this->DatabaseModel->getPrices($from, $to,  $priceType, null, $hotelId,null);
    }
    public function forecastPrices($from,$to,$priceType,$hotelId,$roomId=null){
        //echo $this->googleclient->getLibraryVersion();
        //return;
        //TODO: if roomId ==null get all rooms prices else we should work only on room with roomId 
        $hotelPrices = array();
        $rooms = $this->DatabaseModel->getRooms(null, 1);
        //$hotelOccupancy = $this->DatabaseModel->getOccupancy($from,$to,$hotelId);
        foreach ($rooms as $roomeKey => $roomItem) {
            $roomPrices = array();
            for ($i=1; $i<=$roomItem['capacity']; $i++){
                
                $hotelOccupancy=null;
                $pricesPerUse = $this->DatabaseModel->getPrices($from, $to,  $priceType, $i, $hotelId,$roomItem['id']);
                if (!empty($pricesPerUse)){
                    $newPricesPerUse = $this->forecastprices->getNewPrices($hotelId,$pricesPerUse,$priceType,$hotelOccupancy);
                    //push old and new prices per typeOfUse
                    array_push($roomPrices, array($i=> array("old prices" => $pricesPerUse,"new prices" => $newPricesPerUse)));
                }
            }
            array_push($hotelPrices, array($roomItem['name'] => $roomPrices));
        }
        return $hotelPrices;//$newPrices;
    }
    public function getOccupancy($from,$to,$hotelId,$roomId=null) {
        return $this->ICalModel->getOccupancy($from,$to,$hotelId);
    }
    public function setPrices($from,$to,$prices,$priceType,$hotelId,$roomId=null){}
}
?>