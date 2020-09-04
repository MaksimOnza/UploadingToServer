<?php
require_once 'views/header.php';
?>

    <div class="container">
        <?php
        redirect($_REQUEST['path']);
        ?>
    </div>

<?php
require_once 'views/footer.php';