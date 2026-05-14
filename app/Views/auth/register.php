<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Sewain</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        body {
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            width: 350px;
            border: 1px solid #e0e0e0;
        }
        h2 {
            margin-bottom: 20px;
            color: #333333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555555;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            font-size: 14px;
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #333333;
            color: #ffffff;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }
        .link {
            display: block;
            margin-top: 15px;
            text-align: center;
            font-size: 13px;
            color: #0066cc;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register Sewain</h2>
        <form action="/registerProcess" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Daftar</button>
        </form>
        <a class="link" href="/login">Sudah punya akun? Login</a>
    </div>
</body>
</html>
