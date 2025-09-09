<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Your Name" required><br><br>
        <input type="email" name="email" placeholder="Your Email" required><br><br>
        <textarea name="message" placeholder="Your Message" required></textarea><br><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>
