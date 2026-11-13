<?php
$pageTitle = 'Авторизация — Петросян Марк, 251-361';
$currentPage = 'login';

$correctLogin = 'mark';
$correctPassword = '12345';
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$success = false;

if ($submitted) {
    $login = isset($_POST['login']) && is_string($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) && is_string($_POST['password']) ? $_POST['password'] : '';
    $success = ($login === $correctLogin && $password === $correctPassword);
}

include 'header.php';
?>
<main>
    <h2>Авторизация</h2>
    <form action="login.php" method="post">
        <div class="form-row">
            <label for="login">Логин</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div class="form-row">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-row button-row">
            <span class="form-label"></span>
            <button type="submit">Войти</button>
        </div>
    </form>

    <?php if ($submitted && $success): ?>
        <p class="result">Авторизация прошла успешно!</p>
    <?php elseif ($submitted): ?>
        <p class="result">Неверный логин или пароль.</p>
    <?php endif; ?>
</main>
</body>
</html>
