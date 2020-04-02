<ul>
    <?php foreach ($categories as $categoryItem): ?>
        <li><a href="/<?php echo $categoryItem['eng_name']; ?>"><span><?php echo $categoryItem['name']; ?></span></a></li>
    <?php endforeach; ?>
</ul>

