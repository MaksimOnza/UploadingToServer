<?php
require_once('header.php');
?>
    <div class="container">

<?php require_once('script_form.php'); ?>

    <div class="input-group input-group-prepend">
    <form action="script_form.php" method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <input class="form-control form-control-file" type="file" id="out_" name="inputFile">
            <input class="btn btn-outline-secondary btn-light " id="button" type="submit" name="submit" >
        </div>
    </form>
    <div class="input-group">
        <input type="text" id="out_link" >
        <select size="1" id="listPath" name="list_db[]">

            <?php
            out_list_in_htmlselect('SELECT * FROM files_name WHERE user_id = 1;');
            ?>

        </select>
        <input id="link" class="btn btn-outline-secondary btn-light" type="button"  value="display link" >
    </div>


<?php
require_once('footer.php');
?>