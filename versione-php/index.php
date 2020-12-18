<?php include '../dischi.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>PHP DISCHI</title>
        <link rel="stylesheet" href="../style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
    </head>
    <body>
        <header>
            <h1>PHP DISCHI</h1>
        </header>
        <main>
            <div class="container">
                <div class="filter">
                    <select id="genre-filter">
                        <option value="">-- select genre --</option>
                        <?php foreach ($genres as $genre) { ?>
                            <option value="<?php echo $genre ?>">
                                <?php echo $genre ?>
                            </option>
                            <?php
                        }?>
                    </select>
                </div>
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
        <script id="card-template" type="text/x-handlebars-template">
            <div class="card">
                <img src="{{ poster }}" alt="{{ title }}">
                <p>{{ title }}</p>
                <em class="author">{{ author }}</em>
                <small class="year">{{ year }}</small>
            </div>
        </script>
        <script src="../main.js" charset="utf-8"></script>
    </body>
</html>
