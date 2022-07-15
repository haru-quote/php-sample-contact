<?php
$title = 'お問い合わせ';
$isCompleted = false;

$name = null;
$email = null;
$content = null;

$errorName = null;
$errorEmail = null;
$errorContent = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    if (!$name) {
        $errorName = 'お名前を入力してください。';
    }
    if (!$email) {
        $errorEmail = 'メールアドレスを入力してください。';
    }
    if (!$content) {
        $errorContent = 'お問い合わせ内容を入力してください。';
    }

    if (!$errorName && !$errorEmail && !$errorContent) {
        $contact =
            $_POST['name'] . "\n"
            . $_POST['email'] . "\n"
            . $_POST['content'] . "\n"
        ;

        file_put_contents(__DIR__ . '/contact.txt', $contact);

        $title .= ' (完了)';
        $isCompleted = true;
    }
}
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
</head>

<body>
    <h1><?= $title ?></h1>
    <?php if (!$isCompleted) { ?>
        <form method="POST">
            <div>
                お名前: <input type="text" name="name" value="<?= $name ?>" />
                <?= $errorName ?>
            </div>
            <div>
                メールアドレス: <input type="email" name="email" value="<?= $email ?>" />
                <?= $errorEmail ?>
            </div>
            <div>
                お問い合わせ内容:
                <textarea name="content" rows="10"><?= $content ?></textarea>
                <?= $errorContent ?>
            </div>

            <button type="submit">お問い合わせする</button>
        </form>
    <?php } else { ?>
        お問い合わせ受け付けました！
    <?php } ?>
</body>

</html>
