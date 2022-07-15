<?php
$title = 'お問い合わせ';
$isCompleted = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title .= ' (完了)';
    $isCompleted = true;
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
                お名前: <input type="text" name="name" />
            </div>
            <div>
                メールアドレス: <input type="email" name="email" />
            </div>
            <div>
                お問い合わせ内容:
                <textarea name="content" rows="10"></textarea>
            </div>

            <button type="submit">お問い合わせする</button>
        </form>
    <?php } else { ?>
        お問い合わせ受け付けました！
    <?php } ?>
</body>

</html>
