<?php
/**
 * @var $links array
 * @var $users array
 * @var $name_users
 */
?>
<div style="float: left">Вы вошли как: <div id="name_user" ><?= $_SESSION['user_name'] ?></div>
</div>
<div>
    <table width="100%" border="1" cellpadding="4" cellspacing="0">
        <caption>Users files</caption>
        <tr align="center">
            <th>Files</th>
            <th>Links</th>
            <th>Owner</th>
        </tr>
        <?php
            foreach ($links as $row) {
                print '<tr align="center"><td>' . $row['name_file'] . '</td><td><a href="index.php?path=download&id=' . $row['id_file'] . '">' . $_SERVER['HTTP_HOST'] . '/actions/download.php?id=' . $row['id_file'] . '</a></td><td>' . $name_users[$row['own_user']] . '</td></tr>';
            }
        ?>
    </table>
</div>

<div class="input-group input-group-prepend" style="margin: 5px">
    <form action="/index.php?path=upload" method="POST" enctype="multipart/form-data">
        <br><p><h3 class="h3_body">Upload your file to server:</h3></p>
        <div class="input-group" style="margin: 5px">
            <input style="margin: 10px; width: 295px" class="form-control form-control-file" type="file" id="out_"
                   name="inputFile">
            <input style="margin: 10px" class="btn btn-outline-secondary btn-light " id="button" type="submit"
                   name="submit">
        </div>
    </form>
    <div id="result_form"></div>
    
    <form id="select_form" action="" method="post" >
        <br><p ><h3 class="h3_body" >Transfer to other user:</h3></p>
        <div class="input-group" style="margin: 5px ">
            <input id="delete" style="margin: 10px" class="btn btn-outline-secondary btn-light" type="button"value="Delete file">
            <select id="select_name_file" style="margin: 10px; width: 305px" size="1" id="listPath" name="list_db[]">
                <?php
                    foreach ($links as $row) {
                        print '<option value="'.$row['id_file'].'">' . $row['name_file'] . '</option>';
                    }
                ?>
            </select>
            <input id="link2" style="margin: 10px"  class="btn btn-outline-secondary btn-light" type="button"
                   value="Send file to">
            <select id="select_user" style="margin: 10px; width: 305px" size="1" name="list_db[]">
                <?php
                    foreach ($users as $user) {
                        print '<option value="'.$user['id_user'].'">' . $user['login_user'] . '</option>';
                    }
                ?>
            </select>
            
        </div>
    </form>
</div>