<?php require "partials/head.php"; ?>
<?php require "partials/nav.php"; ?>


<!-- content -->
<div class="container">
    <div class="row">
        <div class="col d-flex flex-column justify-content-center" style="height:80vh">
            <div class="form-group d-flex align-items-center justify-content-center">
                <h1>Create</h1>
            </div>
            <div class="form-group mt-4">
                <h5>Title</h5>
                <input class="form-control" type="text" id="title" name="title" placeholder="title goes here.." />
                <small style="color:red;" class="title-err">
                    <?= isset($errors["title"]) ? $errors["title"] : ""; ?>
                </small>
            </div>
            <div class="form-group mt-4">
                <h5>Content</h5>
                <textarea class="form-control" placeholder="Content goes here.." id="content" name="content" rows="6"></textarea>
                <small style="color:red;" class="content-err">
                    <?= isset($errors["content"]) ? $errors["title"] : ""; ?>
                </small>
            </div>
            <div class="form-group mt-5">
                <button class="p-3 btn btn-primary w-100" id="create-btn">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- /content -->


<?php require "partials/foot.php"; ?>