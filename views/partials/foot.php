</body>

    <?php require "js.php"; ?>

    <?php foreach($jsLinks as $link) : ?>
        <?= linkJs($link); ?>
    <?php endforeach; ?>

</html>