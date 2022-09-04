<div class="admin-page__left-panel">
<div class="control-panel">
    <div class="control-panel__container">
        <a href="<?=HOST?>" class="control-panel__title-wrapper">
            <h2 class="control-panel__title">Digital Nomad</h2>
            <p class="control-panel__subtitle">панель управления</p>
        </a>
        <ul class="control-panel__list">
            <li class="control-panel__list-item"><a class="control-panel__list-link" href="<?=HOST?>admin/blog">
                    <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/book.svg" alt="icon" />
                    </div>Блог
                </a>
            </li>
            <li class="control-panel__list-item"><a class="control-panel__list-link" href="<?=HOST?>admin/categories">
                    <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/folder-open-o.svg" alt="icon" />
                    </div>Категории
                </a>
            </li>
            <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">
                    <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/portfolio.svg" alt="icon" />
                    </div>Портфолио
                </a>
            </li>
            <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">
                    <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/file.svg" alt="icon" />
                    </div>Страницы
                </a>
            </li>
            <li class="control-panel__list-item"><a class="control-panel__list-link" href="<?=HOST?>admin/contacts">
                    <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/contact_mail.svg" alt="icon" />
                    </div>Контакты
                </a>
            </li>
            <li class="control-panel__list-item"><a class="control-panel__list-link" href="<?=HOST?>admin/messages">
                    <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/mail.svg" alt="icon" />
                        
                        <?php if($unreadNum != 0): ?>
                            <div class="control-panel__list-img-badge"><?=$unreadNum?></div>
                        <?php endif; ?>
                    </div>Сообщения
                </a>
            </li>
            <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">
                    <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/message.svg" alt="icon" />
                        <!-- <div class="control-panel__list-img-badge">15</div> -->
                    </div>Комментарии
                </a>
            </li>
            <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">
                    <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/users.svg" alt="icon" />
                    </div>Пользователи
                </a>
            </li>
            <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">
                    <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/settings.svg" alt="icon" />
                    </div>Настройки
                </a>
            </li>
        </ul>
    </div>
    <ul class="control-panel__list">
        <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">
                <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/user.svg" alt="icon" />
                </div>Мой профиль
            </a>
        </li>
        <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">
                <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>app/img/control-panel/log-out.svg" alt="icon" />
                </div>Выход
            </a>
        </li>
    </ul>
</div>
</div>