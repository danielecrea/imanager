<h2><?php echo $title; ?></h2>

<?php foreach ($price as $prices_item): ?>

        <h3><?php echo $prices_item['id']; ?></h3>
        <div class="main">
                <?php echo $prices_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('prices/'.$prices_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>