<?php
/**
 * @var $files array
 */
?>
    <div>
        <div style="float: left; margin-right: 50px;">
            <?php
            if (!empty($files)) {
                foreach ($files as $row) {
                    print $row['id_file'] . ' ' . $row['file_name'] . '</a> <br/>';
                }
            }

            ?>
        </div>
        <div style="float: left; margin-right: 50px;">
            <?php
            if (!empty($files)) {
                foreach ($files as $row) {
                    print '<a href="index.php?path=download&id=' . $row['id_file'] . '">' . $_SERVER['HTTP_HOST'] . '/actions/download.php?id=' . $row['id_file'] . '</a> <br/>';
                }
            }
            ?>
        </div>
    </div>
    <style>
        input .form-control {
            margin: 50px;
        }
    </style>
    <div class="input-group input-group-prepend" style="margin: 5px">
        <form action="/index.php?path=upload&id=<?= $_REQUEST['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="input-group" style="margin: 5px">
                <input style="margin: 10px; width: 295px" class="form-control form-control-file" type="file" id="out_"
                       name="inputFile">
                <input style="margin: 10px" class="btn btn-outline-secondary btn-light " id="button" type="submit"
                       name="submit">
            </div>
        </form>
        <div class="input-group" style="margin: 5px ">
            <select style="margin: 10px; width: 305px" size="1" id="listPath" name="list_db[]">
                <?php
                if (!empty($files)) {
                    foreach ($files as $row) {
                        print '<option >' . $row['file_name'] . '</option>';
                    }
                }
                ?>
            </select>
            <input style="margin: 10px" id="link" class="btn btn-outline-secondary btn-light" type="button"
                   value="display link">
        </div>
    </div>
<?php

