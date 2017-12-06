interface IDataSrc()
{
	public function getPrices(rom,to,hotelId,typeOfUse);
	public function setPrices(rom,to,hotelId,typeOfUse);
	public function getOccupancy(rom,to,hotelId);
	public function getReservation(rom,to,hotelId);
	public function setReservation(rom,to,hotelId);
}