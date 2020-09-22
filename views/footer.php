<script src="jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#link2").click(
            function () {
                sendAjaxForm('result_form', 'select_form', 'index.php?path=sending');
                return false;
            }
        );
    });

    function sendAjaxForm(result_form, ajax_form, url) {
        var target_user_name = document.getElementById('select_user').value;
        var id_file = document.getElementById('select_name_file').value;
        var user_name = document.getElementById('name_user').innerText;
        var tag_options = document.getElementById('select_name_file');
        var file_name = tag_options.options[tag_options.selectedIndex].innerText;
        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            data: {'target_user_name': target_user_name, 'file_name': file_name, 'own_file': user_name, 'id_file': id_file},
            success: function (response) {
                $('#result_form').html(response);
            },
            error: function (response) {
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    }
</script>
</div>
</body>
</html>