<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/onlineshop/assets/css/style.css">
</head>
<body>

    <main>
<div class="form-container">
    <h2>Register</h2>
    <form action="/onlineshop/public/register" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn-primary">Register</button>
    </form>
    <p class="text-center mt-3">Already have an account? <a href="/onlineshop/public/login" class="text-link">Login here</a></p>
</div>
    </main>

</body>
</html>