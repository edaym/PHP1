<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Страница статей</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   </head>
    <body>
        <div class="container">
            <h1>Страница статей</h1>
            <!--<a href="admin">Панель администратора</a> -->
            <a href="admin">
                <button class="btn btn-small btn-info" type="button">Панель администратора</button>
            </a>
            <div>
                <?php foreach($articles as $a): ?>
                    <div class="article">
                        <h3><a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
                        <em>Опубликовоно: <?=$a['date']?></em>
                        <em>Категория: <?=$a['category']?></em>
                        <p><?=article_intro($a['content'])?></p>
                        <p><img
                                src="../blog/admin/<?=$a['imgsrc']?>"
                                width="500" height="250"
                                alt="Добавлена <?=date("d.m.Y H:i:s")?>"
                            >
                        <!--<p><img   нужно прописать запись пути миниатюры в базу данных? аналогично категории и img
                                src="../blog/admin/img/<?//=$miniature?>"
                                width="500" height="250"
                                alt="Добавлена <?//=date("d.m.Y H:i:s")?>"
                            >
                        -->
                    </div>
                <?php endforeach ?>
            </div>
            <div class="footer">
                <p>НЕ укради<br>Copyright &copy; 2017</p>
            </div>
        </div>
    </body>
</html>