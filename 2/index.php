<?php
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../templates/footer.php';

?>
<head>
    <meta charset="UTF-8">
    <title>task 2</title>
</head>

<body>
    <h1 class="m-3">task 2</h1>
    <div class="m-3">
        <p>DELETE FROM categories<br>
            WHERE id NOT IN (SELECT category_id FROM products);
        </p>
        <p>DELETE FROM products<br>
            WHERE id NOT IN (SELECT product_id FROM availabilities);
        </p>
        <p>DELETE FROM stocks<br>
            WHERE id NOT IN (SELECT stock_id FROM availabilities);</p>

    </div>
</body>
