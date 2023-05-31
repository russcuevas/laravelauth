<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
    <h1>Login Page</h1>
    <form action="loginuser" method="POST">
        @csrf
        <span>@error('email') {{ $message }} @enderror</span><br>
        <span>@error('password') {{ $message }} @enderror</span><br>
        <label for="email">Email : </label>
        <input type="email" name="email"><br>
        <label for="">Password : </label>
        <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Login">
        <a href="register">you dont have an account click here</a>
    </form>
</body>
</html>