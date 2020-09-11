<?php
/**
 * @var $content string
 */
render('header', []);
?>

    <div class="container">
        <h1>CONTENT</h1>
        <?php print $content ?>
    </div>

<?php
render('footer', []);