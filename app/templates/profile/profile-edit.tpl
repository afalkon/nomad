<main class="page-profile">
<div class="section">
    <div class="section__title">
        <div class="container">
            <h2 class="heading">Редактировать профиль </h2>
        </div>
    </div>
    <div class="section__body">
        <div class="container">
            <form enctype="multipart/form-data" action="<?=HOST?>profile-edit" method="POST">
                <div class="row justify-content-center">
                    <div class="col-md-8 justify-content-center">
                    <?php include ROOT . 'app/templates/components/errors.tpl'; ?>
                    <?php include ROOT . 'app/templates/components/success.tpl'; ?>
                        <div class="form-group">
                            <label class="input__label">Введите имя * <input class="input input--width-label" type="text" name="name" value="<?=$inputDisplay['name']?>" placeholder="Имя" />
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input__label">Введите фамилию * <input class="input input--width-label" type="text" name="surname" value="<?=$inputDisplay['surname']?>" placeholder="Фамилия" />
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input__label">Введите email * <input class="input input--width-label" type="text" name="email" value="<?=$inputDisplay['email']?>" placeholder="Email" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center pt-40 pb-40">
                    <div class="col-2">

                        <?php if(!empty($user->avatar)): ?>
                        <div class="avatar-big"><img src="<?=HOST?>app/usercontent/avatars/<?=$user->avatar?>" alt="Аватарка" /></div>
                        <?php else: ?>
                        <div class="avatar-big"><img src="<?=HOST?>app/usercontent/noAvatar.jpg" alt="Аватарка" /></div>
                        <?php endif; ?>
                        
                    </div>
                    <div class="col-6">
                        <div class="block-upload">
                            <div class="block-upload__description">
                                <div class="block-upload__title">Фотография</div>
                                <p>Изображение jpg или png, рекомендуемая ширина 160px и больше, высота от 160px и более. Вес до 4Мб.</p>
                                <div class="block-upload__file-wrapper">
                                    <input name="avatar" class="file-button" type="file" placeholder="Выбрать файл">
                                </div>
                            </div>
                        </div>

                        <?php if ( !empty($user->avatar)): ?>
                        <label class="checkbox__item mt-15">
							<input class="checkbox__btn" type="checkbox" name="deleteAvatar"><span class="checkbox__label">Удалить автар</span>
						</label>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="input__label">Введите страну <input class="input input--width-label" type="text" name="country" value="<?=$inputDisplay['country']?>" placeholder="Страна" />
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input__label">Введите город <input class="input input--width-label" type="text" name="city" value="<?=$inputDisplay['city']?>" placeholder="Город" />
                            </label>
                        </div>
                        <div class="form-group form-group--buttons-left">
                            <button name="updateProfile" class="primary-button" type="submit">Сохранить</button>
                            <a class="secondary-button" href="<?=HOST?>profile">Отмена</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</main>