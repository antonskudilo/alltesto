<h2>Регистрация</h2>
<?php if ($result): ?>
    <p>
        Вы зарегестрированы
    </p>
<?php else: ?>
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="#" method="POST">
        <input type="text" name="name" placeholder="name" value="<?php echo $name;?>"><br />
        <input type="email" name="email" placeholder="email" value="<?php echo $email;?>"><br />
        <input type="password" name="password" placeholder="password" value="<?php echo $password;?>"><br />
        <input type="submit" name="submit" class="button_active" value="Регистрация">
    </form>
<?php endif; ?>
