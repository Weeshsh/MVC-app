<!DOCTYPE html>
<html lang="pl-PL">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/styles/index.css">
	<title>Błąd przy wysyłaniu pliku</title>
</head>

<body>
	<div class="main">
		Wysłanie pliku nie powiodło się!
		<?php if ($fileTypeError): ?> <br>Dopuszczalne są tylko pliki typu jpg/png. <?php endif ?>
		<?php if ($fileSizeError): ?> <br>Rozmiar pliku przekracza 1MB. <?php endif ?>
        <br>
        Za 5 sekund zostaniesz przekierowany spowrotem na stronę...
	</div>
	<script type="text/javascript">
		setTimeout(function() {window.location.replace("gallery");}, 5000);
	</script>
</body>

</html>