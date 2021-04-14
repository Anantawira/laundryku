<!DOCTYPE html>
<html>

<head>
    <title>
        Laundryku | Login
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/login/css/global.css">
</head>

<style>
.alert {
    padding: 10px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 20px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>

<body>
    <section class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-xl-4 col-lg-12 col-md-9">
                <form class="form-container" method="POST" action="proses_login.php">
                    <h4 class="text-center font-weight-bold">Login</h4>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" class="form-control error" id="exampleInputUsername" required
                            aria-describedby="username-error" placeholder="Masukan Username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control error" id="exampleInputPassword1" required
                            aria-describedat="password-error" placeholder="Masukan Password" name="password">
                    </div>

                    <?php if (isset($_GET['msg'])) : ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <strong><?= $_GET['msg'];  ?></strong>
                    </div>
                    <?php endif ?>

                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </section>
        </section>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
    </script>

</body>

</html>