<?php
require_once(__DIR__.'../AbstractHotelManager.php');
class AHController extends AbstractHotelManager {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel');
        $this->load->model('ICalModel');
        $this->load->helper('url_helper');
        $this->load->library('ForecastPrices');
    }
    public function getPrices($from,$to,$hotelId,$priceType)
    {
        return $this->DatabaseModel->getPrices($from, $to, $hotelId, $priceType);
    }
    public function forecastPrices($from,$to,$priceType,$hotelId,$roomId=null){
        $data['prices'] = $this->DatabaseModel->getPrices($from, $to, $hotelId, $priceType);  
        $data['occupancy'] = $this->ICalModel->getOccupancy($from,$to,$hotelId);
        $newPrices = $this->ForecastPrices->getNewPrices($hotelId,$prices,$pricesType,$hotelOccupancy);
        return $newPrices;
    }
    public function getOccupancy($from,$to,$hotelId,$roomId=null) {
        return $this->ICalModel->getOccupancy($from,$to,$hotelId);
    }
    public function setPrices($from,$to,$prices,$priceType,$hotelId,$roomId=null){}
}
?>