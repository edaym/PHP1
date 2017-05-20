<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Страница вывода статьи</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   </head>
    <body>
        <div class="container">
            <h1>Страница вывода статьи</h1>
            <div> 
                <div class="article">
                    <h3><?=$article['title'] ?></h3>
                    <em>Опубликовоно: <?=$article['date']?></em>
                    <em>Категория: <?=$article['category']?></em>
                    <p><?=$article['content']?></p>
                </div>
            </div>
            <div class="footer">
                <p>НЕ укради<br>Copyright &copy; 2016</p>
            </div>
        </div>
    </body>
</html>