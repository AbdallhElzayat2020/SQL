<?php

session_start();

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$active_form = $_SESSION['active_form'] ?? '';

session_unset();

if ($name !== null) $_SESSION['name'] = $name;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <link rel="stylesheet" href="style.css">

    <!-- Basic Icons -->
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <!-- Filled Icons -->
    <link href="https://cdn.boxicons.com/3.0.8/fonts/filled/boxicons-filled.min.css" rel="stylesheet">
    <!-- Brand Icons -->
    <link href="https://cdn.boxicons.com/3.0.8/fonts/brands/boxicons-brands.min.css" rel="stylesheet">
</head>

<body>
<!--header-->
<header>
    <a href="#" class="logo">LOGO</a>
    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </nav>

    <div class="user-auth">
        <?php if (!empty($name)) : ?>
            <div class="profile-box">
                <div class="avatar-circle">
                    <?= strtoupper($name[0]) ?>
                </div>
                <div class="dropdown">
                    <a href="#">My Account</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <button type="button" class="login-btn-modal">Login</button>
        <?php endif; ?>
    </div>
</header>
<!--header-->

<!--Hero-->
<section>
    <h1>Hello! <?= $name ?? 'gys'; ?></h1>
</section>
<?php if (!empty($alerts)) : ?>
    <?php foreach ($alerts as $alert) : ?>
        <div class="alert-box">
            <div class="alert <?= $alert['type']; ?>">
                <i class="bxf <?= $alert['type'] == 'success' ? 'bx-check-circle' : 'bxs-x-circle' ?>"></i>
                <span><?= $alert['message']; ?></span>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!--Hero-->

<!--Login Modal-->
<div class="auth-modal <?= $active_form === 'register' ? 'show slide' : ($active_form === 'login' ? 'show' : ''); ?> ">

    <button type="button" class="close-btn-modal"><i class="bxf bx-x"></i></button>

    <!--  Login Form  -->
    <div class="form-box login">
        <h2>Login</h2>
        <form action="auth_process.php" method="POST">
            <div class="input-box">
                <input name="email" type="email" placeholder="Email" required>
                <i class="bxf bx-envelope"></i>
            </div>

            <div class="input-box">
                <input name="password" type="password" placeholder="Password" required>
                <i class="bxf bx-lock"></i>
            </div>

            <button type="submit" name="login_btn" class="btn">Login</button>
            <p>Don't Have an account? <a href="#" class="register-link">Register</a></p>
        </form>
    </div>

    <!--  Register Form  -->
    <div class="form-box register">
        <h2>Register</h2>
        <form action="auth_process.php" method="POST">

            <div class="input-box">
                <input name="name" type="text" placeholder="Name" required>
                <i class="bxf bx-user"></i>
            </div>
            <div class="input-box">
                <input name="email" type="text" placeholder="Email" required>
                <i class="bxf bx-envelope"></i>
            </div>
            <div class="input-box">
                <input name="password" type="password" placeholder="Password" required>
                <i class="bxf bx-lock"></i>
            </div>

            <button type="submit" name="register_btn" class="btn">Register</button>
            <p>Already Have an account? <a href="#" class="login-link">Login</a></p>
        </form>
    </div>

</div>

<script src="./script.js"></script>

</body>

</html>