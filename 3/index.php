<?php
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../templates/footer.php';

require_once 'comments.php';
?>
<head>
    <meta charset="UTF-8">
    <title>task 3</title>
    <style>
        .comment {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            width: 30%;
        }

        form {
            max-width: 30%;
            margin: 20px 0;
        }

        input,
        textarea {
            width: 100%;
            margin: 5px 0;
            padding: 8px;
        }

        .btn {
            border-radius: 0.25rem;
        }
    </style>
</head>

<body>
    <div class="m-3">
        <h1>task 3</h1>
        <h2>Комментарии</h2>
        <div class="comments">
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <p><?= $comment[1] ?></p>
                </div>
            <?php endforeach; ?>
        </div>


        <form method="POST">
            <textarea name="comment" rows="5" placeholder="Ваш комментарий" required value="<?= htmlspecialchars($values["comment"]) ?>"></textarea>
            <button type="submit" class="btn btn-primary ">Отправить</button>
        </form>
    </div>
</body>
