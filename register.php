<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('https://www.thediamondstudio.com/media/uploads/spinning_diamond.gif');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: #fff;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
        }

        h2 {
            margin-bottom: 30px;
        }

        .form-group label {
            color: #ccc;
        }

        .form-control {
            background-color: #333;
            border: none;
            color: #fff;
            padding: 8px;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #c0c0c0;
            border: none;
            color: #000;
            padding: 10px 15px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #000;
            color: #fff;
        }

        .register-link a {
            color: #c0c0c0;
        }

        .register-link a:hover {
            color: #000000;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="include/register_process.php" method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label>No. Telpon:</label>
                <input type="text" name="no_telpon" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" class="form-control" rows="4" required></textarea><br>
            </div>
            <input type="submit" value="Register" class="btn btn-primary">
        </form>
        <div class="register-link">
            <p>Sudah punya akun? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>

</html>