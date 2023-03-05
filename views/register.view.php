<?php require "partials/head.php"; ?>
<?php require "partials/nav.php"; ?>


<!-- content -->
<div class="container">
    <div class="row">
        <div class="d-flex align-items-center justify-content-center col w-100 h-100" style="height:80vh !important;">
            <div class="col-10 d-flex flex-column align-items-center justify-content-center rounded-3 mt-5 register-card">
                <div class="col-10 form-group mt-2 mb-1">
                    <h1 class="header">Register</h1>
                </div>
                <div class="col-10 form-group m-2">
                    <label for="username" class="label"><b>USERNAME</b></label>
                    <input class="form-control" type="text" name="username" />
                </div>
                <div class="col-10 form-group m-2">
                    <label for="password" class="label"><b>PASSWORD</b></label>
                    <input class="form-control" type="password" id="password" name="password" />
                </div>
                <div class="col-10 form-group m-2">
                    <label for="password" class="label"><b>RE-PASSWORD</b></label>
                    <input class="form-control" type="password" id="re-password" name="re-password" />
                </div>
                <div class="col-10 form-group mt-3 mb-3">
                    <button class="btn btn-success w-100 pt-3 pb-3 register-btn">Register</button>
                </div> 
            </div>
        </div>
    </div>
</div>
<!-- /content -->


<?php require "partials/foot.php"; ?>
