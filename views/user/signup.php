<?php include (ROOT.'/views/layouts/header.php');?>
<script type="text/javascript">
    document.title = "iStore - Регистрация";
</script>
<div class="login-signup">
	<h1>Регистрация</h1>
        <?php if($result):?>
        <h2 style="color: #16b716; text-align: center;">Вы успешно зарегистрировались!</h2>
        <?php else:?>
        <form action="#" method="post">
            <p style="color: red;"><?=@$error_name;?></p>
		<input type="text" name="name" placeholder="Имя"><br>
            <p style="color: red;"><?=@$error_email;?></p>
                <input type="email" name="email" placeholder="E-mail" value="<?php echo @$email;?>"><br>
            <p style="color: red;"><?=@$error_password;?><?=@$error_password2;?></p>
		<input type="password" name="password" placeholder="Пароль"><br>
                <input type="password" name="password2" placeholder="Введите пароль еще раз"><br>
		<input type="submit" name="submit" value="Зарегистрироваться" class="account-subm">
	</form>
        <?php endif;?>  
</div>
</div>
<?php include (ROOT.'/views/layouts/footer.php'); ?>