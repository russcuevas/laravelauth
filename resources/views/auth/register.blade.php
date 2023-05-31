<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registeration Page</title>
</head>
<body>
    <form action="registeruser" method="POST">
        @csrf
        <span>@error('name') {{ $message }} @enderror</span>
        <span>@error('email') {{ $message }} @enderror</span><br>
        <span>@error('password') {{ $message }} @enderror</span><br>
        <h1>Registeration Page</h1>
        <label for="name">Full name : </label>
        <input type="text" name="name"><br>
        <label for="email">Email : </label>
        <input type="email" name="email"><br>
        <label for="">Password : </label>
        <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Register">
        <a href="login">you have an account click here</a>
    </form>
</body>
</html>