<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/
bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-5 ">
                <form method="post" action="/smit/pdf/genrate_bill.php">
                    <label>Firstname</label>
                    <input type="text" name="fname" class="form-control" required>
                    <label>Surname</label>
                    <input type="text" name="sname" class="form-control" required>
                    <label>Username</label>
                    <input type="text" name="uname" class="form-control" required>
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                    <input type="submit" name="create" class="btn btn-success" value="Generate PDF">
                </form>
            </div>
        </div>
    </div>
</body>

</html>