<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'includes/head.php'; ?>
</head>

<body>
    <div style="min-height: 70vh;">
        <?php require_once 'includes/menu.php'; ?>
        <form action="/addFavourited" method="post" style="text-align: center;">
            <div class="galeria">
                <?php foreach ($model['images'] as $image): ?>
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
                        if (isset($_SESSION['logged'])) {
                            if (isset($image["favourited"])) {
                                echo "<input type='checkbox' name='{$image['_id']}' value='{$image['_id']}' checked='checked' disabled='disabled'>";
                            } else {
                                echo "<input type='checkbox' name='{$image['_id']}' value='{$image['_id']}'>";
                            }
                        }
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if (isset($_SESSION["logged"]) && count($images) > 0): ?>
                <input type="submit" name="" value="Zapamiętaj wybrane">
            <?php endif ?>
        </form>

        <div class="pagination">
            <?php if ($model['currentPage'] > 1): ?>
                <a href="?page=<?php echo $model['currentPage'] - 1; ?>"> Wstecz </a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $model['totalPages']; $i++): ?>
                <a href="?page=<?php echo $i; ?>" <?php echo ($i == $model['currentPage']) ? 'class="active"' : ''; ?>>
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if ($model['currentPage'] < $model['totalPages']): ?>
                <a href="?page=<?php echo $model['currentPage'] + 1; ?>"> Dalej </a>
            <?php endif; ?>
        </div>

        <form method="post" action="/upload" enctype="multipart/form-data">
            <h3> Wyślij wybrane zdjęcie (plik png lub jpg o rozmiarze do 1MB) </h3>
            <input type="file" name="image" required="required" /></br>
            Dodaj znak wodny:
            <input type="text" name="watermark" required="required" /></br>
            <?php if (isset($_SESSION["logged"])): ?>
                Autor:
                <input type="text" name="author" value="<?php echo $_SESSION["loggedUser"];?> " required="required"
                    autocomplete="off" /><br>
            <?php else: ?>
                Autor:
                <input type="text" name="author" required="required" autocomplete="off" /><br>
            <?php endif ?>
            <?php if (isset($_SESSION["logged"])): ?>
                Zdjecie:<br>
                <input type="radio" name="publicity" value="public" checked="checked" /> publiczne <br>
                <input type="radio" name="publicity" value="private" /> prywatne <br>
            <?php endif ?>

            Tytuł:
            <input type="text" name="title" value="" required="required" autocomplete="off" /><br>

            <input type="reset" name="" value="Wyczyść" />
            <input type="submit" name="submit" value="Wyślij" />
        </form>
    </div>
    <?php include_once 'includes/footer.php'; ?>
</body>
</html>