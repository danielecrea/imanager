<?php
abstract class IDataSrc extends CI_Model
{
	abstract public function getPrices($from,$to,$hotelId,$roomId,$typeOfUse, $slug);
	abstract public function setPrices($from,$to,$hotelId,$roomId,$typeOfUse);
	abstract public function getOccupancy($from,$to,$hotelId,$roomId,$typeOfUse);
	abstract public function getReservation($from,$to,$hotelId,$roomId,$typeOfUse);
	abstract public function setReservation($from,$to,$hotelId,$roomId,$typeOfUse);
}
?>