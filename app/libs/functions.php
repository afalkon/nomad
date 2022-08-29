<?php


// Split $_GET from the main link
function explodeGet(){
    $uri = $_SERVER['REQUEST_URI'];
    return $uriArr = explode('?', $uri);
}

// Link value
function uriModule($uriArr){
    $uri = $uriArr[0];
    $uri = rtrim($uri, "/");
    $uri = substr($uri, 1);
    $uri = filter_var($uri, FILTER_SANITIZE_URL);

    $uriModuleArr = explode('/', $uri);
    if(isset($uriModuleArr[1])){
        return $uriModule = $uriModuleArr[0] . "/" . $uriModuleArr[1];
    } else {
        return $uriModule = $uriModuleArr[0];
    }
}

function rus_date(){
    // Перевод
	$translate = array(
		"am" => "дп",
		"pm" => "пп",
		"AM" => "ДП",
		"PM" => "ПП",
		"Monday" => "Понедельник",
		"Mon" => "Пн",
		"Tuesday" => "Вторник",
		"Tue" => "Вт",
		"Wednesday" => "Среда",
		"Wed" => "Ср",
		"Thursday" => "Четверг",
		"Thu" => "Чт",
		"Friday" => "Пятница",
		"Fri" => "Пт",
		"Saturday" => "Суббота",
		"Sat" => "Сб",
		"Sunday" => "Воскресенье",
		"Sun" => "Вс",
		"January" => "Января",
		"Jan" => "Янв",
		"February" => "Февраля",
		"Feb" => "Фев",
		"March" => "Марта",
		"Mar" => "Мар",
		"April" => "Апреля",
		"Apr" => "Апр",
		"May" => "Мая",
		"May" => "Мая",
		"June" => "Июня",
		"Jun" => "Июн",
		"July" => "Июля",
		"Jul" => "Июл",
		"August" => "Августа",
		"Aug" => "Авг",
		"September" => "Сентября",
		"Sep" => "Сен",
		"October" => "Октября",
		"Oct" => "Окт",
		"November" => "Ноября",
		"Nov" => "Ноя",
		"December" => "Декабря",
		"Dec" => "Дек",
		"st" => "ое",
		"nd" => "ое",
		"rd" => "е",
		"th" => "ое"
    );
    // если передали дату, то переводим ее
    if ( func_num_args() > 1 ) {
        return strtr(date(func_get_arg(0), func_get_arg(1)), $translate);
    }
    // иначе генерируем текущее время
    else {
        return strtr(date(func_get_arg(0)), $translate);
    }
}

// Pagination function
function pagination($resultsPerPage, $numberOfResults){
	 // Пагинация

	 if ( !isset($_GET['page'])){
		 $pageNumber = 1;
	 } else {
		 $pageNumber = intval($_GET['page']);
	 }
	 
	 $numberOfPages = ceil($numberOfResults / $resultsPerPage);

	 if ($pageNumber > $numberOfPages){
		$pageNumber = $numberOfPages;
	 }

	 $startingLimitNumber = ($pageNumber - 1) * $resultsPerPage;
 
	 $sqlPageLimit = "LIMIT {$startingLimitNumber}, {$resultsPerPage}";

	 $pagination['numberOfPages'] = $numberOfPages;
	 $pagination['pageNumber'] = $pageNumber;
	 $pagination['sqlPageLimit'] = $sqlPageLimit;

	 return $pagination;
}

// Uploading images
// saveUploadedImg('cover', 600, 300, 12, 'blog/covers', [1100, 460], [290, 230], $bean->columnFull, $bean->columnSmall)
function saveUploadedImg($inputFileName, $minSize, $maxFileSize, $folderName, $fullSize, $smallSize, $dbFileNameFull, $dbFileNameSmall){

	if (!empty(!empty($_FILES[$inputFileName]['name']))){

		// Получаем данные из массива $_FILES
		$fileName =     $_FILES[$inputFileName]['name'];
		$fileTmpLoc =   $_FILES[$inputFileName]['tmp_name'];
		$fileType =     $_FILES[$inputFileName]['type'];
		$fileSize =     $_FILES[$inputFileName]['size'];
		$fileErrMsg =   $_FILES[$inputFileName]['error'];

		// Получаем расширение файла
		$kaboom = explode(".", $fileName);
		$fileExt = end($kaboom);

		list($width, $height) = getimagesize($fileTmpLoc);
		if ($width < $minSize[0] || $height < $minSize[1]){
			$_SESSION['errors'][] = [   'title' => 'Разрешение загружаемой фотографии слишком мало.', 
										'desc' => 'Выберите другую фотографию с разрешением минимально 600х300px.'];
		}
		if ($fileSize > ($maxFileSize * 1024 * 1024)){
			$_SESSION['errors'][] = [   'title' => 'Размер загружаемой фотографии слишком большой.', 
										'desc' => 'В целях экономии места выберите фотографию с меньшим объемом.'];
		}
		if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)){
			$_SESSION['errors'][] = [   'title' => 'Неверный формат файла.', 
										'desc' => 'Формат фотографии должен быть .gif, .jpg, .jpeg или .png.'];
		}
		if ($fileErrMsg == 1) {
			$_SESSION['errors'][] = [   'title' => 'При загрузке фотографии произошла ошибка. Попробуйте позже.', 
										'desc' => 'Если ошибка появляется снова - обратитесь в службу поддержки.'];
		}

		if (empty($_SESSION['errors'])){
			
			// Путь для хранения
			$coverFolderLoc = ROOT . "app/usercontent/{$folderName}/";

			// Удаление старого изображения, если оно есть
			// Проверка наличия имени full в БД
			if(!empty($dbFileNameFull)){
				// Проверка физического наличия фала full на хостинге
				if(file_exists($coverFolderLoc . $dbFileNameFull)){
					// Удаление файла full
					$deleteCover = unlink($coverFolderLoc . $dbFileNameFull);
				}
			}
			// Проверка наличия имени small в БД
			if(!empty($dbFileNameSmall)){
				// Проверка физического наличия фала small на хостинге
				if(file_exists($coverFolderLoc . $dbFileNameSmall)){
					// Удаление файла small
					$deleteCoverSmall = unlink($coverFolderLoc . $dbFileNameSmall);
				}
			}
			

			/* Generating name for file and upload */
			$dbFileName = rand(1000000, 9999999) . "." . $fileExt;
			$dbFileNameSmall = $smallSize[0] . '-' . $dbFileName;
			$filePathFullSize = $coverFolderLoc . $dbFileName;
			$filePathSmallSize = $coverFolderLoc . $dbFileNameSmall;

			$resultFullSize = resize_and_crop($fileTmpLoc, $filePathFullSize, $fullSize[0], $fullSize[1]);
			$resultSmallSize = resize_and_crop($fileTmpLoc, $filePathSmallSize, $smallSize[0], $smallSize[1]);
			if ($resultFullSize != true || $resultSmallSize != true) {
				$_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла.'];
				return false;
			}
		}
		return [$dbFileName, $dbFileNameSmall];
	}
}