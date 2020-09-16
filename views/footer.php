<script  src="jquery-3.5.1.min.js"></script>
<script  src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#link2").click(
            function(){
                sendAjaxForm('result_form', 'select_form', 'test_page.php');
                return false;
            }
        );
    });
    function sendAjaxForm(result_form, ajax_form, url) {
        var target_user_name = document.getElementById('select_user').value;
        var file_name = document.getElementById('select_name_file').value;
        var user_name = document.getElementById('name_user').innerText;

        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            data: {'target_user_name': target_user_name, 'file_name':file_name, 'own_file' : user_name},
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