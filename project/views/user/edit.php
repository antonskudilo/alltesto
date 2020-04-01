<h2>Изменение данных пользователя</h2>
<?php if ($result): ?>
    <p>
        Данные изменены
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
        <p>Имя</p>
        <input type="text" name="name" placeholder="name" value="<?php echo $name;?>"><br />
        <p>Email</p>
        <input type="email" name="email" placeholder="email" value="<?php echo $email;?>"><br />
        <p>Пароль</p>
        <input type="password" name="password" placeholder="password" value="<?php echo $password;?>"><br />
        <input type="submit" name="submit" class="button_active" value="Изменить">
    </form>
<?php endif; ?>
