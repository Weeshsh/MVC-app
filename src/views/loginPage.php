<!DOCTYPE html>
<html lang="pl-PL">

<head>
	<?php require_once 'includes/head.php'; ?>
</head>

<body>
    <?php require_once 'includes/menu.php'; ?>
	<div class="main" style="min-height: 60vh;">
        <h3>Zaloguj się</h3>
        <form method="POST" action="/login">
            Nazwa użytkownika:
            <input type="text" name="username" value="" required="required" autocomplete="off" /><br>
            Hasło:
            <input type="password" name="password" value="" required="required" autocomplete="off"><br>
            <input type="submit" value="zaloguj" name="submit"/>
        </form>
        <?php if(isset($wrongPassword)): ?>
            <p style="color: red"> Wpisano złe hasło! </p>
        <?php endif; ?>
        <?php if(isset($noUserFound)): ?>
            <p style="color: red"> Nie znaleziono użytkownika o takiej nazwie! </p>
        <?php endif; ?>
	</div>
    <?php include_once 'includes/footer.php'; ?>
</body>

</html>