<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'includes/head.php'; ?>
</head>

<body>
<?php require_once 'includes/menu.php'; ?>
    <div style="min-height: 70vh;">
        <h2> Galeria wybranych zdjęć </h2>
        <form action="/unfavourite" method="post" style="text-align: center;">
            <div class="galeria">
                <?php foreach ($images as $image): ?>
                    <div>
                        <?php echo "<a href='/images/{$image['_id']}/watermarked{$image['type']}'>"; ?>
                        <?php echo "<img src='/images/{$image['_id']}/thumbnail{$image['type']}' alt='miniaturka'>"; ?>
                        </a>
                        <?php if ($image["public"] !== "public"): ?>
                            <p style="color: blue"> Zdjęcie prywatne </p>
                        <?php endif ?>
                        <p>Tytuł:
                            <?php echo $image["title"]; ?>
                        </p>
                        <p>Autor:
                            <?php echo $image["author"]; ?>
                        </p>
                        <?php
                        if (isset($_SESSION["logged"])) {
                            echo "<input type='checkbox' name='{$image['_id']}' value='{$image['_id']}'>";
                        }
                        ?>
                    </div>
                <?php endforeach ?>
            </div>
            <?php if (isset($_SESSION["logged"])): ?>
                <input type="submit" name="" value="Usuń zaznaczone z ulubionych">
            <?php endif ?>
        </form>
    </div>
    <?php include_once 'includes/footer.php'; ?>
</body>

</html>