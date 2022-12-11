
<?php require_once "partials/_header.php" ?>
<main class="form-signin pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form>
                    <h1 class="d-block text-center h3 mb-3 fw-normal"> Sign In</h1>

                    <div class="form-floating  mb-2">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating  mb-2">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once "partials/_footer.php" ?>