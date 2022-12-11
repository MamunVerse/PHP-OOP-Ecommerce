
<?php require_once "partials/_header.php" ?>
<main class="form-signin pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="/register" enctype="multipart/form-data">
                    <h1 class="d-block text-center h3 mb-3 fw-normal">Register</h1>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="username" placeholder="User name">
                        <label >User Name</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <label >Email address</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <label >Password</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="file" class="form-control" name="profile_photo">
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once "partials/_footer.php" ?>