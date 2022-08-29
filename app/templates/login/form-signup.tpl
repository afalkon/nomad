<form class="authorization-form" method="POST" action="<?php echo HOST; ?>signup">
    <div class="authorization-form__heading">
        <h2 class="heading">Регистрация </h2>
    </div>

    <?php include ROOT . 'app/templates/components/errors.tpl'; ?>
    <?php include ROOT . 'app/templates/components/success.tpl'; ?>


    <div class="authorization-form__input">
        <input name="email" class="input" type="text" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="Email" />
    </div>
    <div class="authorization-form__input">
        <input name="password" class="input" type="password" placeholder="Пароль" />
    </div>
    <div class="authorization-form__button">
        <button name="signup" value="submit" class="primary-button" type="submit">Зарегистрироваться</button>
    </div>
    <div class="authorization-form__links"><a href="<?php echo HOST; ?>login">Вход на сайт</a></div>
</form>