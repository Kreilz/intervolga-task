<?php
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../templates/footer.php';

require_once 'function.php';

?>
<head>
    <meta charset="UTF-8">
    <title>task 5</title>
    <style>
        body {
            font-size: 20px;
        }
        .btn{
            border-radius: 0.25rem;
        }
    </style>
</head>

<body>
    <h1 class="m-3">task 5</h1>

    <div class="m-3">
        <form method="post">
            Количество братьев Алисы: <input type="number" name="brothers" min="0" required value="<?= htmlspecialchars($values["brothers"]) ?>" class="m-2"><br>
            Количество сестёр Алисы: <input type="number" name="sisters" min="0" required value="<?= htmlspecialchars($values["sisters"]) ?>" class="m-2"><br>
            <button type="submit" class="btn btn-primary mt-4 mb-4">Найти количество сестёр</button>
        </form>
        <p><?= $result ?></p>
    </div>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

