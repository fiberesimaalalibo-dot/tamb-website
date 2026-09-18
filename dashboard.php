<?php

require_once 'db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

if (isset($_GET['logout'])) {

    session_unset();
    session_destroy();

    header("Location: dashboard.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['action'])
    && $_POST['action'] === 'login') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {

        $login_error = 'Please enter your username and password.';

    } else {

        $sql = "SELECT id, username, password_hash
                FROM admin_users
                WHERE username = :username";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username
        ]);

        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {

            session_regenerate_id(true);

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];

            header("Location: dashboard.php");
            exit;

        } else {

            $login_error = 'Invalid username or password.';

        }
    }
}


/*
|--------------------------------------------------------------------------
| IF NOT LOGGED IN — SHOW LOGIN
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION['admin_id'])):

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | TAMBELS 4 REAL NIG. LTD</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5 col-lg-4">

            <div class="contact-card">

                <div class="text-center mb-4">

                    <img
                        src="logo.png"
                        alt="Tambels 4 Real Nig. Ltd"
                        class="company-logo mb-3"
                    >

                    <h2>Admin Login</h2>

                    <p class="text-muted">
                        Sign in to manage the website.
                    </p>

                </div>


                <?php if ($login_error): ?>

                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($login_error); ?>
                    </div>

                <?php endif; ?>


                <form method="POST">

                    <input
                        type="hidden"
                        name="action"
                        value="login"
                    >

                    <div class="mb-3">

                        <label class="form-label">
                            Username
                        </label>

                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            required
                        >

                    </div>


                    <div class="mb-4">

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >

                    </div>


                    <button
                        type="submit"
                        class="btn btn-brand w-100"
                    >
                        Login
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>

<?php

exit;

endif;


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | TAMBELS 4 REAL NIG. LTD</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="style.css">

</head>

<body>


<header class="site-header">

    <div class="container">

        <div class="d-flex align-items-center justify-content-between py-3">

            <a href="index.php">

                <img
                    src="logo.png"
                    alt="Tambels 4 Real Nig. Ltd"
                    class="company-logo"
                >

            </a>


            <div>

                <a
                    href="index.php"
                    class="btn btn-outline-brand me-2"
                >
                    View Website
                </a>

                <a
                    href="dashboard.php?logout=1"
                    class="btn btn-brand"
                >
                    Logout
                </a>

            </div>

        </div>

    </div>

</header>


<main class="section-padding">

    <div class="container">

        <div class="mb-5">

            <span class="hero-label">
                ADMINISTRATION
            </span>

            <h1 class="mt-2">
                Dashboard
            </h1>

            <p class="text-muted">
                Welcome,
                <?php echo htmlspecialchars($_SESSION['admin_username']); ?>.
            </p>

        </div>


        <!-- DASHBOARD SECTIONS WILL GO HERE -->

        <div class="row g-4">

            <div class="col-md-6">

                <div class="contact-card">

                    <h3>
                        <i class="bi bi-file-text me-2"></i>
                        Site Content
                    </h3>

                    <p class="text-muted">
                        Manage the Home, About Us and Contact sections.
                    </p>

                    <button class="btn btn-brand">
                        Manage Content
                    </button>

                </div>

            </div>


            <div class="col-md-6">

                <div class="contact-card">

                    <h3>
                        <i class="bi bi-images me-2"></i>
                        Projects
                    </h3>

                    <p class="text-muted">
                        Add, edit, hide and show project categories.
                    </p>

                    <button class="btn btn-brand">
                        Manage Projects
                    </button>

                </div>

            </div>


            <div class="col-md-6">

                <div class="contact-card">

                    <h3>
                        <i class="bi bi-envelope me-2"></i>
                        Messages
                    </h3>

                    <p class="text-muted">
                        View enquiries submitted through the website.
                    </p>

                    <button class="btn btn-brand">
                        View Messages
                    </button>

                </div>

            </div>
            


        </div>

    </div>

</main>


</body>
</html>