<?php

/**
 * @param \PDO $pdo
 * @return array
 */
function getComments($pdo)
{
    try {
        $res = $pdo->query("SELECT * FROM comments;");
        return $res->fetchAll();
    } catch (PDOException $error) {
        exit("Error getting comments: " . $error->getMessage());
    }
}

/**
 * @param \PDO $pdo
 * @param string $comment
 */
function saveComment($pdo, $comment)
{
    try {
        $query = $pdo->prepare("INSERT INTO comments (comment) VALUES (?)");
        $query->execute([$comment]);
    } catch (PDOException $error) {
        exit("Error sending comment: " . $error->getMessage());
    }
}
