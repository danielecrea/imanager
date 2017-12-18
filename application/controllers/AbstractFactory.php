<?php
abstract class AbstractFactory
{
	static abstract function getHotelManager($typeOfHotelManager);
	static abstract function getChannelManager($typeOfChannelManager);
}
?>