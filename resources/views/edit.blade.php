<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 600px;
            width: 100%;
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555555;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.1);
            outline: none;
        }
        .form-group textarea {
            height: 120px;
            resize: vertical;
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
        }
        .btn:hover {
            background-color: #218838;
        }
        .error-messages {
            margin-top: 20px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 6px;
            padding: 15px;
        }
        .error-messages ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Post</h1>
    <form action="{{ url('/posts/' . $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn">Update</button>
    </form>
    @if($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
</body>
</html>
