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
    }
    public function getPrices($from,$to,$hotelId,$priceType)
    {        
        return $this->DatabaseModel->getPrices($from, $to,  $priceType, null, $hotelId,null);
    }
    public function forecastPrices($from,$to,$priceType,$hotelId,$roomId=null){
        //TODO: try to get the prices for each type of use so you can work with all the price's rates
        $data['prices'] = $this->DatabaseModel->getPrices($from, $to,  $priceType, null, $hotelId,null);  
        //$hotelOccupancy = $this->ICalModel->getOccupancy($from,$to,$hotelId);
        $hotelOccupancy=null;
        $data['newPrices'] = $this->forecastprices->getNewPrices($hotelId,$data['prices'],$priceType,$hotelOccupancy);
        return $data;//$newPrices;
    }
    public function getOccupancy($from,$to,$hotelId,$roomId=null) {
        return $this->ICalModel->getOccupancy($from,$to,$hotelId);
    }
    public function setPrices($from,$to,$prices,$priceType,$hotelId,$roomId=null){}
}
?>