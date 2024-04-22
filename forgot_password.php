<?php 
require './config/connect.php';
include './includes/header.php';

?>
<div class="container pt-5">
    <!-- Outer Row -->
    <div class="row justify-content-center pt-5">
        <div class="card-body p-5">
            <form class="user" method="post" action="./handlers/process_forgot_password.php">
                <div class="form-group mb-4">
                    <label for="email">Please Enter Your Email</label>
                    <input type="email" class="form-control form-control-user mt-3" id="exampleInputEmail"
                        aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" />
                </div>
                <div class="row">
                    <div class="text-start">
                        <button class="btn action-1">Send</button>
                        <a href="index.php" class="btn action-2">Back To Store</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include './includes/footer.php'; ?>