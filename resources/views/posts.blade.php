<!DOCTYPE html>
<html>
<head>
    <title>Posts List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #eaecef;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #0275d8;
            color: #fff;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #0275d8;
            font-weight: bold;
        }
        a:hover {
            color: #0056b3;
        }
        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            color: #fff;
            background-color: #5bc0de;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #31b0d5;
        }
        .edit-btn {
            background-color: #f0ad4e;
        }
        .edit-btn:hover {
            background-color: #ec971f;
        }
        .delete-btn {
            background-color: #d9534f;
        }
        .delete-btn:hover {
            background-color: #c9302c;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            padding: 10px 20px;
            margin: 0 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-decoration: none;
            color: #0275d8;
        }
        .pagination a:hover {
            background-color: #f0f0f0;
        }
        .pagination .active {
            background-color: #0275d8;
            color: #fff;
            border: 1px solid #0275d8;
        }
    </style>
</head>
<body>
<a href="{{ url('/posts/create') }}" class="btn">Create</a>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Posted_BY</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->user->name }}</td>
            <td>
                <a href="{{ url('/posts/' . $post->id . '/edit') }}" class="btn edit-btn">Edit</a>
                <a href="{{ url('/posts/' . $post->id) }}" class="btn">View</a>
                <form action="{{ url('/posts/' . $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn delete-btn">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pagination">
    {{ $posts->links() }}
</div>
</body>
</html>
