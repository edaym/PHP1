<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Страница добавления статьи</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   </head>
    <body>
        <div class="container">
            <h1>Страница добавления статьи</h1>
            <h3>Форма добавления статьи</h3>
            <div>
                <form class="form-horizontal" method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                                        <div class="form-group">
                                            <label>
                                                Категория
                                                    <input type="checkbox" name="category" value="<?=$article['category']?>"> Новости
                                                    <input type="checkbox" name="category" value="<?=$article['category']?>"> Юмор
                                                    <input type="checkbox" name="category" value="<?=$article['category']?>"> Политика
                                            </label>
                                        </div>
                    <div class="form-group">
                    <label>
                        Категория
                        <input type="text" name="category" size="50" value="<?=$article['category']?>" class="form-control" autofocus required>
                    </label>
                    </div>
                    <div class="form-group">
                    <label>
                        Название
                        <input type="text" name="title" size="50" value="<?=$article['title']?>" class="form-control" autofocus required>
                    </label>
                    </div>
                    <div class="form-group">
                    <label>
                        Дата
                        <input type="date" name="date" value="<?=$article['date']?>" class="form-control" required>
                    </label>
                    </div>
                    <div class="form-group">
                    <label>
                        Содержимое
                        <textarea name="content" cols="150" rows="15" class="form-control" required><?=$article['content']?></textarea>
                    </label>
                    </div>
                    <input type="submit" value="Сохранить" class="btn btn-small btn-info">
                </form>
            </div>
            <div class="footer">
                <p>НЕ укради Copyright &copy; 2017</p>
            </div>
        </div>
    </body>
</html>