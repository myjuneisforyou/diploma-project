<?php include (ROOT.'/views/layouts/header.php');?>
<script type="text/javascript">
    document.title = "iStore - Изменение пароля";
</script>
<div class="login-signup">
	<h1>Изменение пароля</h1>
        <?php if($result):?>
        <h2 style="color: #16b716;">Данные успешно отредактированы!</h2>
        <?php else:?>
	<form action="#" method="post">
            <p>Пароль должен содержать не менее 6-ти символов! <span style="color: red;"><?=@$error_password;?><?=@$error_password2;?></span></p>
                <input type="password" name="password" placeholder="Пароль"><br>
                <input type="password" name="password2" placeholder="Введите пароль еще раз"><br>
		<input type="submit" name="submit" value="Редактировать" class="account-subm">
	</form>
        <?php endif;?>
</div>
</div>

<?php include (ROOT.'/views/layouts/footer.php'); ?>