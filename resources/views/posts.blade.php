<!doctype html>
<head>
    <link rel="stylesheet" href="/app.css">
</head>
<title>My First Post </title>
<body>
    <?php foreach ($posts as $post): ?>
    <article>
        <h1><a href ="posts/<?=$post->slug?>"><?= $post->title?></a></h1>
        <?= $post->excerpt; ?>
    </article>
    <?php endforeach; ?>
</body>