<?php include (ROOT.'/views/layouts/header.php'); ?>
<script type="text/javascript">
    document.title = "iStore - Аккаунт";
</script>
<div id="account_about"> 
    <h2>Личные данные</h2>
        <table class="account_info">
            <tr>
                <td>Имя:</td>
                <td><?php echo $user['name'];?></td>
            </tr>
            <tr>
                <td>Телефон:</td>
                <td><?php echo $user['phone'];?></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><?php echo $user['email'];?></td>
            </tr>
            <tr>
                <td>Город:</td>
                <td><?php echo $user['city'];?></td>
            </tr>
            <tr>
                <td>Адрес:</td>
                <td><?php echo $user['adress'];?></td>
            </tr>
        </table>
    <hr>    
        <table class="account_action">
            <tr><td><a href="/account/edit">Изменить персональные данные</a></td></tr>
            <tr><td><a href="/account/email">Изменить Email</a></td></tr> 
            <tr><td><a href="/account/password">Изменить пароль</a></td></tr> 
            <tr><td><a href="/user/logout" onmouseover="this.style.color = 'red';"onmouseout="this.style.color = '#000';">Выход</a></td></tr>
        </table>
</div>
</div>
<?php include (ROOT.'/views/layouts/footer.php'); ?>
