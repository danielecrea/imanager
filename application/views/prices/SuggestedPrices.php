<h3>Please check if you want to apply these prices</h3>
<table>
<!--create header	-->
<?php   
    //	print_r($prices);
	// Open form and set URL for submit form
	echo form_open('prices/setNewPrices');
	foreach ($prices as $roomsPrices){
?>
		<th colspan="4"><?php echo key($roomsPrices); ?></th>
		<tr><td>Date</td><td>TypeOfUse</td><td>Price</td><td>SuggestedPrice</td><tr>
		
			<?php
				foreach ($roomsPrices as $pricesPerRoom) {
					foreach ($pricesPerRoom as $pricesPerUse) {
						foreach ($pricesPerUse as $priceItem) {
						?>
							<tr>	
								<td align="center">
								<?php
								  echo $priceItem["old prices"][0]["date"];
								?>
								</td>
								<td align="center">
								<?php
								  echo key($pricesPerUse);
								?>
								</td>
								<td align="center">
								<?php
								  echo $priceItem["old prices"][0]["price"];
								?>
								</td>
								<td align="center">
								<?php
									$data = array(
								        'name'          => 'roomsPrices['.$priceItem['new prices'][0]['roomId'].']['.$priceItem['new prices'][0]['price'].']',
								        'id'            => 'priceItem',
								        'value'         => $priceItem["new prices"][0]["price"],
								        'maxlength'     => '4',
								        'size'          => '4',
								        'style'         => 'width:50%'
									);
									echo form_input($data)
								?>
								
								</td>
							</tr>
		<?php			}
					}
				}
	}
			?>	
</table>

    <div class="main">
    <br/>

<?php echo form_submit('mysubmit', 'Apply Prices!');//endforeach; ?>
<?php echo form_close();?>
