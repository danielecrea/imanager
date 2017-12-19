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
    public function getStandardPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId=null){}
    public function getActivePrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId=null){}
    public function setPrices($from,$to,$prices,$priceType,$typeOfUse=null,$hotelId, $roomId=null){}
    public function forecastPrices($from, $to, $priceType, $hotelId, $roomId=null){}
    public function getOccupancy($from, $to,$hotelId, $roomId=null){}
    public function getRooms($hotelId){}
}
?>