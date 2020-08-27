<?php
/**
 * @var $files array
 */

foreach ($files as $row) {
    print $row['id_file'] . ' ' . '<a href="/script.php?id=' . $row['id_file'] . '">' . $row['file_name'] . '</a> <br/>';
}
?>
<div class="input-group input-group-prepend">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <input class="form-control form-control-file" type="file" id="out_" name="inputFile">
            <input class="btn btn-outline-secondary btn-light " id="button" type="submit" name="submit">
        </div>
    </form>
    <div class="input-group">
        <input type="text" id="out_link">
        <select size="1" id="listPath" name="list_db[]">

            <?php
            foreach ($files as $row) {
                print '<option >' . $row['file_name'] . '</option>';
            }
            ?>

        </select>
        <input id="link" class="btn btn-outline-secondary btn-light" type="button" value="display link">
    </div>
</div>
