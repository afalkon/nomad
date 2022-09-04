		<section class="page-contacts__feedback">
			<div class="container">
				<div class="row">
					<div class="col-6">
						<div class="block-contacts">
							<div class="block-contacts__title">
								<h2 class="heading"><?=$values['contacts_title']?></h2>
							</div>
							<div class="block-contacts__info">
								<?=$values['contacts_text']?>
							</div>
						</div>
					</div>
					<div class="col-6">
						<form enctype="multipart/form-data" action="<?=HOST?>contacts" class="feedback-form" method="POST">
							<div class="feedback-form__heading">
								<h2 class="heading">Напишите мне </h2>
							</div>

							<?php include ROOT . 'app/admin/templates/components/errors.tpl' ?>
        					<?php include ROOT . 'app/admin/templates/components/success.tpl' ?>
							
							<div class="feedback-form__input">
								<input name="name" class="input" type="text" placeholder="Ваше имя" />
							</div>
							<div class="feedback-form__input">
								<input name="email" class="input" type="text" placeholder="Email" />
							</div>
							<div class="feedback-form__input">
								<textarea name="message" class="textarea" placeholder="Введите сообщение"></textarea>
							</div>
							<div class="feedback-form__upload">
								<div class="block-upload">
									<div class="block-upload__description">
										<div class="block-upload__title">Прикрепить файл:</div>
										<p>jpg, png, gif, pdf, zip, rar, doc, docx вес до 25 Мб</p>
										<div class="block-upload__file-wrapper">
											<input name="uploadedFile" class="file-button" type="file">
										</div>
									</div>
								</div>
							</div>
							<button name="submit" value="submit" class="primary-button" type="submit">Отправить</button>
						</form>
					</div>
				</div>
			</div>
		</section>