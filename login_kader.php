<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kader</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container login-container">
        <h1>Login Kader Posyandu</h1>
        <form action="proses_login_kader.php" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="email" required />

            <label for="password">kata sandi</label>
            <input type="password" id="password" name="password" placeholder="password" required />

            <button type="submit" class="btn login-btn">Login</button>
        </form>
    </div>
</body>
</html>