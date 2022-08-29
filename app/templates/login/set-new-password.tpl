<form class="authorization-form" method="POST" action="<?php echo HOST; ?>set-new-password">
    <div class="authorization-form__heading">
        <h2 class="heading">Установить новый пароль</h2>
    </div>

    <?php include ROOT . 'app/templates/components/errors.tpl'; ?>
    <?php include ROOT . 'app/templates/components/success.tpl'; ?>

    <?php if (!isset($newPasswordReady)) : ?>
    <div class="authorization-form__input">
        <input class="input" name="password" type="password" placeholder="Новый пароль" />
    </div>
    <input type="hidden" name="email" value="<?=$_GET['email']?>">
    <input type="hidden" name="resetCode" value="<?=$_GET['code']?>">
    <div class="authorization-form__button">
        <button class="primary-button" name="set-new-password" value="set-new-password" type="submit">Восстановить пароль</button>
    </div>
    <?php endif; ?>


    <div class="authorization-form__links">
        <a href="<?php echo HOST; ?>login">Войти на сайт</a>
        <a href="<?php echo HOST; ?>signup">Регистрация</a></div>
</form>