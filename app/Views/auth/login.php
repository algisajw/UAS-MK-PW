<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Sewain</title>
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
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 14px;
            border: 1px solid #f5c6cb;
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
        <h2>Login Sewain</h2>
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>
        <form action="/loginProcess" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <a class="link" href="/register">Belum punya akun? Register</a>
    </div>
</body>
</html>
