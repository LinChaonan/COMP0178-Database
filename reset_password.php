<?php include_once("header.php")?>

    <div class="container">
        <h2 class="my-3">Reset your password</h2>

        <form method="POST" action="reset_password.php">

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Please enter your email">
                    <small id="emailHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label text-right">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Please enter your password">
                    <small id="passwordHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="passwordConfirmation" class="col-sm-2 col-form-label text-right">Repeat password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="repeat_password" id="passwordConfirmation" placeholder="Please enter your password again">
                    <small id="passwordConfirmationHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label text-right">Address</label>
                <div class="col-sm-10">
                    <input type="address" class="form-control" name="address" id="address" placeholder="Please enter your home address">
                    <small id="addressHelp" class="form-text text-muted"><span class="text">* Optional</span></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label text-right">Phone Number</label>
                <div class="col-sm-10">
                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="Please enter your phone number">
                    <small id="phoneHelp" class="form-text text-muted"><span class="text">* Optional</span></small>
                </div>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary form-control">Register</button>
            </div>
        </form>


<?php include_once("footer.php")?>