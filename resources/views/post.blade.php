<!doctype html>
<head>
    <link rel="stylesheet" href="/app.css">
</head>
<title>My First Post </title>
<body>
    <article>
        <h1><?= $post->title?></h1>
        <?php //dd($post); ?><?= $post->body; ?>
    </article>
    <a href="/">Go back </a>
</body>