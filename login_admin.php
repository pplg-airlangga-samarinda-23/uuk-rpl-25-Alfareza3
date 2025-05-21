<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container login-container">
        <h1>Login Admin Posyandu</h1>
        <form action="proses_login_admin.php" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="email" required />

            <label for="password">kata sandi</label>
            <input type="password" id="password" name="password" placeholder="password" required />

            <button type="submit" class="btn login-btn">Login</button>
        </form>
    </div>
</body>
</html>