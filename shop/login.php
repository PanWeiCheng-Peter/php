<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form action="process_login.php" method="POST">
            <!-- Replace the logo -->
            <img class="mb-4" src="logo.png" alt="Logo" width="72" height="72">

            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <!-- Updated label for Email -->
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="email" placeholder="Email/Username" required>
                <label for="floatingInput">Email/Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember_me">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>

            <!-- Change background color of the Submit button -->
            <button class="btn w-100 py-2" type="submit" style="background-color: #007BFF; color: white;">Sign in</button>

            <p class="text-center mt-3"><a href="forgot_password.php">Forgot Password?</a></p>
        </form>
    </main>
</body>

<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>