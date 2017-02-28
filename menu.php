<?php ## Меню.

$menu = [
    ["title" => "Главная",
        "link" => "http://vk.com",
        "active" => "true",
        "menu_type" => ["top"],
        "position" => "0"],
    ["title" => "О нас",
        "link" => "http://vk.com",
        "active" => "true",
        "menu_type" => ["left"],
        "position" => "3"],
    ["title" => "Новости",
        "link" => "http://vk.com",
        "active" => "true",
        "menu_type" => ["top", "left"],
        "position" => "1",
        "children"=> [
            ["title" => "Политика",
                "link" => "http://vk.com",
                "active" => "true",
                "menu_type" => ["top", "left", "bottom"],
                "position" => "2"],
            ["title" => "Спорт",
                "link" => "http://vk.com",
                "active" => "true",
                "menu_type" => ["top", "bottom"],
                "position" => "1"],
            ["title" => "Финансы",
                "link" => "http://vk.com",
                "active" => "true",
                "menu_type" => ["top", "left"],
                "position" => "0"],
            ]
    ],
    ["title" => "Блог",
        "link" => "http://vk.com",
        "active" => "true",
        "menu_type" => ["left", "bottom"],
        "position" => "4"],
    ["title" => "Контакты",
        "link" => "http://vk.com",
        "active" => "true",
        "menu_type" => ["top", "left", "bottom"],
        "position" => "2",
        "children"=> [
                ["title" => "Адрес",
                    "link" => "http://vk.com",
                    "active" => "true",
                    "menu_type" => ["top", "left", "bottom"],
                    "position" => "2"],
                ["title" => "Телефон",
                    "link" => "http://vk.com",
                    "active" => "true",
                    "menu_type" => ["top", "bottom"],
                    "position" => "1"],
                ["title" => "Мы на карте",
                    "link" => "http://vk.com",
                    "active" => "true",
                    "menu_type" => ["top", "left"],
                    "position" => "0"],
               ]
        ],
    ];
?>