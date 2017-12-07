<h2><?php echo $title;?></h2>

<?php foreach ($prices as $prices_item): ?>

        <h3><?php echo $prices_item['id']; ?></h3>
        <div class="main">
                <?php echo $prices_item['date']." ".$prices_item['roomId']." ".$prices_item['typeOfUse']." ".$prices_item['price']." ".$prices_item['standardPrice']; ?>
        </div>
        <br/>

<?php endforeach; ?>