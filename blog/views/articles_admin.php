<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Страница администратора</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   </head>
    <body>
        <div class="container">
            <h1>Страница администратора</h1>
            <h3>Панель администратора</h3>
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>Дата</th>
                        <th>Заголовок</th>
                        <th>Категория</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach($articles as $a): ?>
                    <tr>
                        <td><?=$a['date']?></td>
                        <td><?=$a['title']?></td>
                        <td><?=$a['category']?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?=$a['id']?>">Редактировать</a>
                        </td>
                        <td>
                            <a href="index.php?action=delete&id=<?=$a['id']?>">Удалить</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>

                <a href="index.php?action=add">
                    <button class="btn btn-small btn-primary" type="button">Добавить статью</button>
                </a>
                <a href="../index.php">
                    <button class="btn btn-small btn-info" type="button">На страницу статей</button>
                </a>
            </div>
            <div class="footer">
                <p>НЕ укради<br>Copyright &copy; 2016</p>
            </div>
        </div>
    </body>
</html>