<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vivify Blog</title>
</head>
<body>
    <div>
        <p>Hello, {{ $author->name }}</p>
        <p>The user {{ $user->name }} has left a comment on your post: <i>{{ $post->title }}</i></p>
        <blockquote>
            {{ $comment->body }}
        </blockquote>
    </div>
</body>
</html>