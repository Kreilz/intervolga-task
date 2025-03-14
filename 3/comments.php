<?php

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/db.php';

//обрабатываем POST-запрос, сохраняя комментарий в бд
if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];
    if (!empty($comment)) {
        saveComment($pdo, $comment);
        $comments = getComments($pdo);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

//получаем список комментариев из бд
$comments = getComments($pdo);
