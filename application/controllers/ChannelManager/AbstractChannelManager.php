<?php
abstract class AbstractChannelManager extends CI_Controller
{
	abstract function getPrices($from, $to, $priceType, $roomId);
	abstract function getOccupancy($from,$to,$hotelId, $roomId);
	abstract function setPrices($from,$to,$prices,$priceType,$hotelId,$roomId);
}
?>