<?php include_once("header.php")?>

<div class="container">
<h2 class="my-3">Change your password</h2>

    <form method="POST" action="process_reset.php">
        <br>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label text-right">Current Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password" placeholder="Please enter your current password">
                <small id="passwordHelp" class="form-text text-muted"><span class="text-danger">* Required</span></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="new_password" class="col-sm-2 col-form-label text-right">New Password</label>
            <div class="col-sm-10">
                <input type="new_password" class="form-control" name="new_password" id="new_password" placeholder="Please enter your new password">
                <small id="new_passwordHelp" class="form-text text-muted"><span class="text-danger">* Required</span></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-2 col-form-label text-right">Repeat Password</label>
            <div class="col-sm-10">
                <input type="password_confirmation" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Please enter your new password again">
                <small id="password_confirmationHelp" class="form-text text-muted"><span class="text-danger">* Required</span></small>
            </div>
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-primary form-control">Change Password</button>
        </div>
    </form>

</div>

<?php include_once("footer.php")?>



