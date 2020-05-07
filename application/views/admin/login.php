<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/customLogin2.css'); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/9bceecac14.js" crossorigin="anonymous"></script>

    <title>Perpustakaan | Login Page</title>

</head>
<body>
    <div class="card card-custom">
        <div class="card-header">
            <p class="text-center"><i class="fas fa-book-reader"></i><a class="judul" href="<?php echo site_url(); ?>"> Simple Perpus</a></p>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('admin/login'); ?>" method="post">
                <div class="form-group">
                    <!-- <label for="username">Username</label> -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" name="username" id="username" class="form-control" placeholder="username">
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label for="password">Password</label> -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                        </div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password">
                    </div>
                </div>
                <div class="box">
                    <button type="submit" class="btn btn-primary m-2">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
