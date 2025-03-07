<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/index.css">
    <title>Pomyślnie zalogowano</title>
</head>

<body>
    <div class="main">
        Udało ci się zalogować, <?php echo $username; ?>
        <br>
        Za 5 sekund zostaniesz przekierowany spowrotem na stronę...
        <script type="text/javascript">
            setTimeout(function () { window.location.replace("gallery"); }, 5000);
        </script>
</body>

</html>