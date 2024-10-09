<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Titles</title>
</head>
<body>
    <h1>Your Titles</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('titles.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Enter title" required>
        <button type="submit">Add Title</button>
    </form>

    <ul>
        @foreach ($titles as $title)
            <li>{{ $title->title }} (User ID: {{ $title->user_id }})</li>
        @endforeach
    </ul>

</body>
</html>
