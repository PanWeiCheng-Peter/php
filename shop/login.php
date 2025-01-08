<!DOCTYPE HTML>
<html>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form>
            <img class="mb-4" src="logo.png" alt="" width="72"
                height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <label for="floatingInput">Email address</label>
                <input type="Email/Username" class="form-control" id="floatingInput" placeholder="name@example.com">
            </div>
            <div class="form-floating">
                <label for="floatingPassword">Password</label>
                <input type="Password" class="form-control" id="floatingPassword" placeholder="Password">
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit" style="background-color: #ff5733; color: white;">Sign in</button>
        </form>
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

    .form-signin input[type="Email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="Password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>

<html>