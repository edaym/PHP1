<?php
    header("Content-Type: text/html; charset=utf-8");
//require_once 'database.php';
    function article_all($link){
        // Запрос
        $query = "SELECT * FROM `articles` ORDER BY id DESC";
       // $result = mysqli_query($link, $query);
        $result = $link->query($query);

        if (!$result)
            die(mysqli_error($link));
        
        // Извлечение из БД количества строк
        //$n = mysqli_num_rows($result);
        $n = $result-> rowCount();
        $articles = array();
        
        for ($i = 0; $i < $n; $i++){
           // $row = mysqli_fetch_assoc($result);
            $row = $result->fetch();
            $articles[] =$row; //добавление ассоциативного массива строки из таблицы в массив артиклс
        }

        
        return $articles;
    }

    function article_get($link, $id_article){
        // Запрос
        $query = "SELECT * FROM `articles` WHERE id=".(int)$id_article;
        //$result = mysqli_query($link, $query);
        $result = $link->query($query);
        
        if (!$result)
            die(mysqli_error($link));

        //$article = mysqli_fetch_assoc($result);
        $article = $result->fetch();
        
        return $article;
    }

    function article_new($link, $title, $date, $content, $category){
        // Подготовка
        $title = trim($title);
        $content = trim($content);
        $category = trim ($category);
        // Проверка
        if ($title == '')
            return false;
        // Запрос
        $t = "INSERT INTO articles (title, date, content, category) VALUE ('%s', '%s', '%s', '%s')";
        
        //$query = sprintf($t, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $date), mysqli_real_escape_string($link, $content));
        $query = sprintf($t, $title, $date, $content, $category);

        //$result = mysqli_query($link, $query);
        $result = $link->query ($query);
        if (!$result)
            //die(mysqli_error($link));
            die ($link->errorInfo());
            
        return true;
    }

    function article_edit($link, $id, $title, $date, $content, $category){
        // Подготовка
        $title = trim($title);
        $content = trim($content);
        $date = trim($date);
        $id = (int)$id;
        $category = trim($category);
        
        // Проверка
        if ($title == '')
            return false;
        
        // Запрос
        $sql = "UPDATE articles SET title='%s', date='%s', content='%s', category='%s' WHERE id = %d";
        
        //$query = sprintf($sql, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $date), mysqli_real_escape_string($link, $content), $id);
        $query = sprintf($sql, $title, $date, $content, $category, $id);

        //$result = mysqli_query($link, $query);;
        $result = $link->query ($query);
        if (!$result)
            //die(mysqli_error($link));
            die ($link->errorInfo());
            
        return mysqli_affected_rows($link);
    }

    function article_delete($link, $id){
        // Подготовка
        $id = (int)$id;
        
        // Проверка
        if ($id == '')
            return false;
        
        $query = sprintf("DELETE FROM articles WHERE id=%d", (int)$id);
        //$result = mysqli_query($link, $query);
        $result = $link->query ($query);
        
        if (!$result)
            //die(mysqli_error($link));
            die ($link->errorInfo());

        return mysqli_affected_rows($link);        
    }

    function article_intro($text, $len = 500){
        return mb_substr($text, 0, $len);
    }
?>