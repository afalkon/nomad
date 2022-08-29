<?php if ($isUserLogged === false) : ?>

<div class="noUserWrapper">
    <h1 class="noUserWrapper__heading mb-25">Вы не вошли на сайт</h1>
    <p>Воспользуйтесь 
    <a href="<?=HOST?>login">формой входа </a>
    на сайт, или 
    <a href="<?=HOST?>signup>">зарегистрируйтесь</a>.</p>
</div>

<?php elseif ($user['id'] === 0) : ?>

<div class="noUserWrapper">
    <h1 class="noUserWrapper__heading mb-25">Такого пользователя не существует</h1>
    <p><a href="<?=HOST?>">Перейти на главную</a>.</p>
</div>

<?php else : ?>

<div class="section">
    <div class="container">
        <div class="section__title">
            <h2 class="heading">Профиль пользователя </h2>
        </div>

        <div class="section__body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php include ROOT . 'app/templates/components/success.tpl'; ?>
                </div>
            </div>

            <?php if(empty($user->name)): ?>
            <div class="row justify-content-center mb-40">
                <div class="col-md-6">
                    <div class="enter-or-reg flex-column">
                        <div class="enter-or-reg-text mb-30">
                            Профиль пока что пуст. 😥
                        </div>
                        <?php if ($_SESSION['logged_user']['role'] === 'admin'): ?>
                            <a class="secondary-button" href="<?=HOST?>profile-edit?id=<?=$_GET['id']?>">Редактировать</a>
                        <?php elseif ($_SESSION['logged_user']['id'] === $user['id']):  ?>
                            <a class="secondary-button" href="<?=HOST?>profile-edit?id=<?=$_GET['id']?>">Редактировать</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php else: ?>


            <div class="row justify-content-center">
                <div class="col-md-2">

                    <?php if(!empty($user->avatar)): ?>
                    <div class="avatar-big"><img src="<?=HOST?>app/usercontent/avatars/<?=$user->avatar?>" alt="Аватарка" /></div>
                    <?php else: ?>
                    <div class="avatar-big"><img src="<?=HOST?>app/usercontent/noAvatar.jpg" alt="Аватарка" /></div>
                    <?php endif; ?>

                </div>
                <div class="col-md-4">
                    <div class="definition-list mb-20">

                        <?php if($user->name != NULL): ?>
                        <dl class="definition">
                            <dt class="definition__term">имя и фамилия</dt>
                            <dd class="definition__description"> <?=$user->name?> <?=$user->surname?></dd>
                        </dl>
                        <?php endif; ?>

                        
                        <dl class="definition">
                            <dt class="definition__term">

                            <?php if(!empty($user->country) && empty($user->city)): ?>
                            Страна
                            <?php elseif(!empty($user->city) && empty($user->country)): ?>
                            Город
                            <?php elseif(!empty($user->country) && !empty($user->city)): ?>
                            Страна, город
                            <?php endif; ?>
                            </dt>
                            <dd class="definition__description"> 
                            
                            <?php if(!empty($user->country) && empty($user->city)): ?>
                            <?=$user->country?>
                            <?php elseif(!empty($user->city) && empty($user->country)): ?>
                            <?=$user->city?>
                            <?php elseif(!empty($user->country) && !empty($user->city)): ?>
                            <?=$user->country?>, <?=$user->city?>
                            <?php endif; ?>
                            </dd>
                        </dl>
                    </div>
                    <?php if ($_SESSION['logged_user']['role'] === 'admin'): ?>
                    <a class="secondary-button" href="<?=HOST?>profile-edit?id=<?=$_GET['id']?>">Редактировать</a>
                    <?php elseif ($_SESSION['logged_user']['id'] === $user['id']):  ?>
                    <a class="secondary-button" href="<?=HOST?>profile-edit?id=<?=$_GET['id']?>">Редактировать</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="section bg-grey">
    <div class="container">
        <div class="section__title">
            <h2 class="heading">Комментарии пользователя </h2>
        </div>
        <div class="section__body">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="comment">
                        <div class="comment__avatar"><a href="#">
                                <div class="avatar-small"><img src="<?=HOST?>app/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                            </a>
                        </div>
                        <div class="comment__data">
                            <div class="comment__user-info">
                                <div class="comment__username">Джон До</div>
                                <div class="comment__date"><img src="<?=HOST?>app/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                            </div>
                            <div class="comment__text">
                                <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="comment__avatar"><a href="#">
                                <div class="avatar-small"><img src="<?=HOST?>app/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                            </a>
                        </div>
                        <div class="comment__data">
                            <div class="comment__user-info">
                                <div class="comment__username">Джон До</div>
                                <div class="comment__date"><img src="<?=HOST?>app/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                            </div>
                            <div class="comment__text">
                                <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="comment__avatar"><a href="#">
                                <div class="avatar-small"><img src="<?=HOST?>app/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                            </a>
                        </div>
                        <div class="comment__data">
                            <div class="comment__user-info">
                                <div class="comment__username">Джон До</div>
                                <div class="comment__date"><img src="<?=HOST?>app/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                            </div>
                            <div class="comment__text">
                                <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif ; ?>