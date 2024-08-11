<!DOCTYPE html>
<html>
<head>
    <title>Post Details</title>
</head>
<body>
<table border="1" width="200px" height="100px">
    <tr><td>ID</td><td>{{ $post->id }}</td></tr>
    <tr><td>Title</td><td>{{ $post->title }}</td></tr>
    <tr><td>Content</td><td>{{ $post->content }}</td></tr>
    <tr><td>Posted_BY</td><td>{{ $post->user->name }}</td></tr>
</table>
</body>
</html>
