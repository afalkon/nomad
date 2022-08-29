<form class="authorization-form" method="POST" action="<?php echo HOST; ?>lost-password">
    <div class="authorization-form__heading">
        <h2 class="heading">Восстановить пароль</h2>
    </div>

    <?php include ROOT . 'app/templates/components/errors.tpl'; ?>
    <?php include ROOT . 'app/templates/components/success.tpl'; ?>

    <div class="authorization-form__input">
        <input class="input" name="email" type="text" placeholder="Email" />
    </div>
    <div class="authorization-form__button">
        <button class="primary-button" name="lost-password" value="lost-password" type="submit">Восстановить пароль</button>
    </div>
    <div class="authorization-form__links">
        <a href="<?php echo HOST; ?>login">Войти на сайт</a>
        <a href="<?php echo HOST; ?>signup">Регистрация</a></div>
</form>