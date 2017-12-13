<?php
abstract class ChannelAbstractFactory
{
	static abstract function getPrice($from,$to,$hotelId,$priceType);
	static abstract function setPrices($from,$to,$prices,$priceType,$hotelId,$roomId);
}
?>