<?php
/**
 * @var $files array
 */
?>
<div style="float: left">Вы вошли как: <div id="name_user" ><?= $_SESSION['user_name'] ?></div>
</div>
<div>
    <table width="100%" border="1" cellpadding="4" cellspacing="0">
        <caption>Users files</caption>
        <tr align="center">
            <th>&nbsp</th>
            <th>Files</th>
            <th>Links</th>
            <th>Owner</th>
            <th>From</th>
        </tr>

        <?php
        if (!empty($files)) {
            foreach ($files as $row) {
                print '<tr align="center"><td>' . $row['id_file'] . '</td><td>' . $row['file_name'] . '</td><td><a href="index.php?path=download&id=' . $row['id_file'] . '">' . $_SERVER['HTTP_HOST'] . '/actions/download.php?id=' . $row['id_file'] . '</a></td><td>' . $row['own_file'] . '</td><td></td></tr>';
            }
        }
        ?>
    </table>
</div>

<style>
    input .form-control {
        margin: 50px;
    }
</style>
<div class="input-group input-group-prepend" style="margin: 5px">
    <form action="/index.php?path=upload" method="POST" enctype="multipart/form-data">
        <br>
        <p>
        <h3>Upload your file to server:</h3></p>
        <div class="input-group" style="margin: 5px">
            <input style="margin: 10px; width: 295px" class="form-control form-control-file" type="file" id="out_"
                   name="inputFile">
            <input style="margin: 10px" class="btn btn-outline-secondary btn-light " id="button" type="submit"
                   name="submit">
        </div>
    </form>
    <div id="result_form"></div>
    <form id="select_form" action="" method="post">
        <div class="input-group" style="margin: 5px ">
            <select id="select_name_file" style="margin: 10px; width: 305px" size="1" id="listPath" name="list_db[]">
                <?php
                if (!empty($files)) {
                    foreach ($files as $row) {
                        print '<option >' . $row['file_name'] . '</option>';
                    }
                }
                ?>
            </select>
            <input id="link2" style="margin: 10px"  class="btn btn-outline-secondary btn-light" type="button"
                   value="Send file to">
            <select id="select_user" style="margin: 10px; width: 305px" size="1" name="list_db[]">
                <?php
                if (!empty($users)) {
                    foreach ($users as $user) {
                        print '<option >' . $user['login_user'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
    </form>
</div>