<?php
$pageTitle = 'Обратная связь — Петросян Марк, 251-361';
$currentPage = 'feedback';

$name = isset($_GET['name']) && is_string($_GET['name']) ? $_GET['name'] : '';
$email = isset($_GET['email']) && is_string($_GET['email']) ? $_GET['email'] : '';
$source = isset($_GET['source']) && is_string($_GET['source']) ? $_GET['source'] : '';

include 'header.php';
?>
<main>
    <h2>Напишите нам</h2>
    <p>Заполните форму, чтобы оставить предложение или жалобу.</p>

    <form action="home.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <label for="name">ФИО</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="form-row">
            <label for="email">Ваш e-mail</label>
            <input type="email" id="email" name="email" placeholder="example@mail.ru" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="form-row">
            <label for="message">Сообщение</label>
            <textarea id="message" name="message" rows="6" required></textarea>
        </div>

        <div class="form-row">
            <label for="category">Тема обращения</label>
            <select id="category" name="category">
                <option value="propose">Предложение</option>
                <option value="complaint">Жалоба</option>
            </select>
        </div>

        <div class="form-row">
            <span class="form-label">Откуда узнали о сайте</span>
            <div class="field radio-group">
                <label><input type="radio" name="source" value="internet" <?php if ($source === 'internet') echo 'checked'; ?> required> Реклама из интернета</label>
                <label><input type="radio" name="source" value="friends" <?php if ($source === 'friends') echo 'checked'; ?>> Рассказали друзья</label>
            </div>
        </div>

        <div class="form-row">
            <label for="attachment">Выбор файла</label>
            <input type="file" id="attachment" name="attachment">
        </div>

        <div class="form-row">
            <span class="form-label">Согласие</span>
            <label class="field checkbox-label"><input type="checkbox" name="consent" value="1" required> Даю согласие на обработку данных</label>
        </div>

        <div class="form-row button-row">
            <span class="form-label"></span>
            <button type="submit">Отправить</button>
        </div>
    </form>
</main>
</body>
</html>
