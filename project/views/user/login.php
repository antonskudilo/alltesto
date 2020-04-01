<h2>Вход</h2>
<?php if (isset($errors) && is_array($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="#" method="POST">
    <input type="email" name="email" placeholder="email" value="<?php echo $email;?>"><br />
    <input type="password" name="password" placeholder="password" value="<?php echo $password;?>"><br />
    <input type="submit" name="submit" class="button_active" value="Войти">
</form>

<?php echo $_SESSION['user']; ?>