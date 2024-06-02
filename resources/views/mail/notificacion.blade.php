<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notification</title>
</head>
<body>
    <h1>Send Notification Email</h1>
    <form action="{{ route('api.mail.notification') }}" method="POST">
        @csrf
        <label for="user">User Email:</label><br>
        <input type="email" id="user" name="user" required><br><br>
        <label for="title">Email Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>
        <button type="submit">Send Notification</button>
    </form>
</body>
</html>
