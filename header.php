<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="header-content">
        <h1>Форма обратной связи</h1>
        <p>Петросян Марк · 251-361</p>
        <nav>
            <a href="index.php" class="<?php echo $currentPage === 'feedback' ? 'active' : ''; ?>">Обратная связь</a>
            <a href="login.php" class="<?php echo $currentPage === 'login' ? 'active' : ''; ?>">Авторизация</a>
        </nav>
    </div>
</header>
