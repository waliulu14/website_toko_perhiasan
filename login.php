<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="icon" href="img/logo_title.png" type="image/icon type" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <h2>Login</h2>
        <form action="include/login.php" method="POST" id="loginForm">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required><br>
            </div>

            <input type="submit" value="Login" class="btn btn-primary">
        </form>

        <div class="register-link">
            <p>Jika belum punya akun, <a href="register.php">daftar di sini</a></p>
        </div>
    </div>

    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'failed') {
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Login gagal",
                text: "Silakan coba lagi.",
                timer: 3000,
                showConfirmButton: false
            });
        </script>';
    } elseif (isset($_GET['status']) && $_GET['status'] == 'success') {
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "Login berhasil",
                text: "Selamat datang!",
                timer: 3000,
                showConfirmButton: false
            });
        </script>';
    }
    ?>
</body>

</html>