<!DOCTYPE html>
<html lang="pl-PL">

<head>
	<?php require_once 'includes/head.php'; ?>
</head>

<body>
    <?php require_once 'includes/menu.php'; ?>
	<div class="main" style="min-height: 60vh;">
        <?php if(isset($userExists)): ?>
            <p style="color: red"> Użytkownik <?php echo $user; ?> już istnieje!</p>
        <?php endif; ?>
        <?php if(isset($passwordError)): ?>
            <p style="color: red"> Powtórzone hasło nie jest takie samo! </p>
        <?php endif; ?>
        <h3>Formularz rejestracyjny</h3>
        <form method="POST" action="/addUser">
            E-mail:
            <input type="email" name="email" value="" required="required" /><br>
            Nazwa użytkownika:
            <input type="text" name="username" value="" required="required" autocomplete="off" /><br>
            Hasło:
            <input type="password" name="password" value="" required="required" autocomplete="off"><br>
            Powtórz hasło:
            <input type="password" name="passRep" value="" required="required" autocomplete="off"><br>
            <input type="submit" value="zarejestruj się" name="submit"/>
        </form>

	</div>
    <?php include_once 'includes/footer.php'; ?>
</body>

</html>