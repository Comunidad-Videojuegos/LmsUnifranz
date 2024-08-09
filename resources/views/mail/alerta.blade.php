<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Alert</title>
</head>
<body>
    <h1>Send Alert Email</h1>
    <form action="{{ route('api.mail.alert') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="user">User Email:</label><br>
        <input type="email" id="user" name="user" required><br><br>
        <label for="title">Email Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>
        <label for="file">Attach Files:</label><br>
        <input type="file" id="file" name="file[]" multiple><br><br>
        <button type="submit">Send Alert</button>
    </form>
</body>
</html>
