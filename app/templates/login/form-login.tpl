<form class="authorization-form" method="POST" action="<?php echo HOST; ?>login">
    <div class="authorization-form__heading">
        <h2 class="heading">Вход на сайт </h2>
    </div>

    <?php include ROOT . 'app/templates/components/errors.tpl'; ?>
    <?php include ROOT . 'app/templates/components/success.tpl'; ?>

    <div class="authorization-form__input">
        <input class="input" name="email" type="text" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="Email" />
    </div>
    <div class="authorization-form__input">
        <input class="input" name="password" type="password" placeholder="Пароль" />
    </div>
    <div class="authorization-form__button">
        <button class="primary-button" name="submit" value="login" type="submit">Вход на сайт</button>
    </div>
    <div class="authorization-form__links">
        <a href="<?php echo HOST; ?>lost-password">Забыл пароль</a>
        <a href="<?php echo HOST; ?>signup">Регистрация</a></div>
</form>