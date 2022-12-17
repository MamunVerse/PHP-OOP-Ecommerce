
<?php require_once "partials/_header.php" ?>
<main class="form-signin pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php  require_once 'partials/_notification.php' ?>
                <form action="/login" method="post">
                    <h1 class="d-block text-center h3 mb-3 fw-normal"> Sign In</h1>

                    <div class="form-floating  mb-2">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Email">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating  mb-2">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once "partials/_footer.php" ?>