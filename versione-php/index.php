<?php include 'dischi.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>PHP DISCHI</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <header>
            <h1>PHP DISCHI</h1>
        </header>
        <main>
            <div class="container">
                <div class="card-container">
                    <?php foreach ($dischi as $album) { ?>
                        <div class="card">
                            <img src="<?php echo $album['poster'] ?>" alt="">
                            <p>
                                <?php echo $album['title'] ?>
                            </p>
                            <em class="author">
                                <?php echo $album['author'] ?>
                            </em>
                            <small class="year">
                                <?php echo $album['year'] ?>
                            </small>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
        </main>
    </body>
</html>
