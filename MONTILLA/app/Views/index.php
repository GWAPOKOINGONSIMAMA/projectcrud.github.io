<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        body {
            background-color: #f0f2f5;
        }

        .card {
            height: 500px;
            width: 450px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 80px auto;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            color: #1877f2; 
            margin-bottom: 20px;
        }

        .form-label {
            text-align: left;
            margin-bottom: 0;
            margin-top: 40px;
            display: block;
        }

        .btn-primary {
            background-color: #1877f2;
            border-color: #1877f2; 
            margin-top: 20px;
        }
        .btn-primary:hover {
            background-color: #0e5a8a;
            border-color: #0e5a8a;
          
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card p-4">
                    <form action="<?= base_url('main/auth') ?>" method="post">
                        <h1>Login</h1>
                        <hr />
                        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="usr" class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Enter Username" name="username" id="usr">
                            <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'username') : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password" id="pwd">
                            <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span><br><br>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
