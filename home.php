<?php
$pageTitle = 'Ответ на обращение — Петросян Марк, 251-361';
$currentPage = 'feedback';

$sent = $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['name'], $_POST['email'], $_POST['message'], $_POST['category'], $_POST['source'], $_POST['consent']);

if ($sent) {
    $name = is_string($_POST['name']) ? trim($_POST['name']) : '';
    $email = is_string($_POST['email']) ? trim($_POST['email']) : '';
    $message = is_string($_POST['message']) ? trim($_POST['message']) : '';
    $category = is_string($_POST['category']) ? $_POST['category'] : '';
    $source = is_string($_POST['source']) ? $_POST['source'] : '';
    $sent = $name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)
        && $message !== '' && in_array($category, ['propose', 'complaint'], true)
        && in_array($source, ['internet', 'friends'], true)
        && $_POST['consent'] === '1';
}

if ($sent) {
    $fileName = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($_FILES['attachment']['name']);
    }
    $returnLink = 'index.php?' . http_build_query([
        'name' => $name,
        'email' => $email,
        'source' => $source
    ]);
}

include 'header.php';
?>
<main>
    <?php if ($sent): ?>
        <h2>Ответ на обращение</h2>
        <p>Здравствуйте, <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>!</p>

        <?php if ($category === 'propose'): ?>
            <p>Спасибо за ваше предложение:</p>
        <?php else: ?>
            <p>Мы рассмотрим вашу жалобу:</p>
        <?php endif; ?>

        <div class="message-box"><?php echo nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')); ?></div>

        <?php if ($fileName !== ''): ?>
            <p>Прикреплённый файл: <?php echo htmlspecialchars($fileName, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <a class="button" href="<?php echo htmlspecialchars($returnLink, ENT_QUOTES, 'UTF-8'); ?>">Заполнить снова</a>
    <?php else: ?>
        <h2>Форма не отправлена</h2>
        <p>Пожалуйста, заполните все обязательные поля.</p>
        <a class="button" href="index.php">Вернуться к форме</a>
    <?php endif; ?>
</main>
</body>
</html>
