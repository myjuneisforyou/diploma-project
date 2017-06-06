<?php include (ROOT.'/views/layouts/header.php');?>
<script type="text/javascript">
    document.title = "iStore - Логин";
</script>
<div class="login-signup">
	<h1>Вход в аккаунт</h1>
        <a href="/user/signup" style="color: #000;">Нет аккаунта? <span style="color: #16b716;">Зарегистрироваться</span></a>
	<form action="#" method="post"> 
            <p style="color: red;"><?=@$error_error;?></p>
            <p style="color: red;"><?=@$error_email;?></p>
		<input type="email" name="email" placeholder="E-mail"><br>        
            <p style="color: red;"><?=@$error_password;?></p>
		<input type="password" name="password" placeholder="Password"><br>
		<input type="submit" name="submit" value="Вход" class="account-subm">
	</form>
</div>

</div>
<?php include (ROOT.'/views/layouts/footer.php'); ?>