<nav class="navbar">
      <div class="logo">Moje hobby</div>
      <ul class="menu">
        <li><a href="/">Wprowadzenie</a></li>
        <li><a href="/gallery">Galeria</a></li>
        <?php if(isset($_SESSION["logged"])): ?>
			<?php if(isset($_SESSION["favouritedImages"])): ?>
				<?php if(count($_SESSION["favouritedImages"]) > 0): ?>
					<li><a href="/favourites">Ulubione zdjęcia</a></li>
				<?php endif ?>
			<?php endif ?>
			<li><a href="/logout">Wyloguj się</a></li>
		<?php else: ?>
			<li><a href="/loginPage">Zaloguj się</a></li>
			<li><a href="/register">Zarejestruj się</a></li>
		<?php endif ?>
      </ul>
    </nav>