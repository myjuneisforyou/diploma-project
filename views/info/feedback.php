<?php include (ROOT.'/views/layouts/header.php'); ?>
<script type="text/javascript">
    document.title = "iStore - Обратная связь";
</script>
<div class="support">
    <?php if($result == true):?>
    <p>Письмо отправлено! Мы приложим все усилия для того, чтобы ответить вам максимально быстро.</p>
    <?php else: ?>
    <h2>Обратная связь</h2>
    <p>Письмо будет отправлено в службу поддержки. Мы приложим все усилия для того, чтобы ответить вам максимально быстро.</p>   
<form method="post" action="#">
    <table style="float: left;">
        <tr>
            <td>
                <input type="text" name="subject" placeholder="Тема сообщения">
            </td>
        </tr>
        <tr>
            <td><span style="color: red;"><?=@$error_name;?></span></td>
        </tr>
        <tr>
            <td>
                <input type="text" name="name" placeholder="Имя" value="<?php if(!User::isGuest()) echo $user["name"];?>">
            </td>
        </tr>
        <tr>
            <td><span style="color: red;"><?=@$error_email;?></span></td>
        </tr>
        <tr>
            <td>
                <input type="text" name="email" placeholder="Ваш Email" value="<?php if(!User::isGuest()) echo $user["email"];?>">
            </td>
        </tr>
    </table>
    <table style="float: right;">
        <tr>
            <td><span style="color: red;"><?=@$error_message;?></span></td>
        </tr>
            <tr>
                <td>
                <textarea  name="message" placeholder="Сообщение"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="submit" value="Отправить" class="account-subm">
                </td>
            </tr>
    </table>
</form>
    <?php endif; ?>
</div>
</div>
<?php include (ROOT.'/views/layouts/footer.php'); ?>