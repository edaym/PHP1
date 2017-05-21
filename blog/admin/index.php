<?php
    header("Content-Type: text/html; charset=utf-8");
    require_once("../database.php");
    require_once("../models/articles.php");

    $link = db_connect();

    if (isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action ="";

    if ($action == "add"){
//img------------------
                    if (!empty($_FILES['uploadfile']['name']))
                    {
                        $uploaddir='img/';
                        $uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);

                        if (!is_uploaded_file($_FILES['uploadfile']['tmp_name']))
                        {
                            echo 'ошибка передачи файла';
                        }
                        else
                        {

                            if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile))
                            {
                                //$link = db_connect();
                                //$res = $link->query('INSERT INTO `img`(`id`, `src`) VALUES ("9","'.$uploadfile.'")');
                                if($res) echo "Файл упешно загружен";
                                else echo "Путь не добавлен в базу данных, но файл загружен";
                                print_r($link->errorInfo());
                            }
                            else echo "Файл не загружен, ";
                        }

                    }
//img------------------
        include("gd.php"); //обработка изображений и создание миниатюр и загрузка их в /admin/img

        if (!empty($_POST)){
            article_new($link, $_POST['title'], $_POST['date'], $_POST['content'], $_POST['category'], $uploadfile );
            header("Location: index.php");
        }

        include("../views/article_admin.php");


    }
    else if ($action == "edit"){

                            if (!empty($_FILES['uploadfile']['name']))
                            {
                                $uploaddir='img/';
                                $uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);

                                if (!is_uploaded_file($_FILES['uploadfile']['tmp_name']))
                                {
                                    echo 'ошибка передачи файла';
                                }
                                else
                                {

                                    if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile))
                                    {
                                        //$link = db_connect();
                                        //$res = $link->query('INSERT INTO `img`(`id`, `src`) VALUES ("9","'.$uploadfile.'")');
                                        if($res) echo "Файл упешно загружен";
                                        else echo "Путь не добавлен в базу данных, но файл загружен";
                                        print_r($link->errorInfo());
                                    }
                                    else echo "Файл не загружен, ";
                                }

                            }

        if (!isset($_GET['id']))
            header("Location: index.php");
        $id = (int)$_GET['id'];
        
        if (!empty($_POST) && $id > 0){
            article_edit($link, $id, $_POST['title'], $_POST['date'], $_POST['content'], $_POST['category'], $uploadfile );
            header("Location: index.php");
        }
        
        $article = article_get($link, $id);
        include("../views/article_admin.php");
    } else if ($action == "delete"){
        $id = $_GET['id'];
        article_delete($link, $id);
        header("Location: index.php");
    }
    else{
        $articles = article_all($link);
        include("../views/articles_admin.php");
    }
    
?>