<?php
abstract class AbstractHotelManager extends CI_Controller
{
	abstract function getStandardPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId=null);
	abstract function getActivePrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId=null);
	abstract function setPrices($from,$to,$prices,$priceType,$typeOfUse=null,$hotelId, $roomId=null);
	abstract function forecastPrices($from, $to, $priceType, $hotelId, $roomId=null);
	abstract function getOccupancy($from, $to,$hotelId, $roomId=null);
	abstract function getRooms($hotelId);
}
?>