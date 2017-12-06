<?php
abstract class AbstractHotelManager extends CI_Controller
{
	abstract function getStandardPrices();
	abstract function getActualPrices();
	abstract function getRealAvailabilities();
	abstract function setOTAPrices();
	abstract function setOfficialWebsitePrices();
}
?>