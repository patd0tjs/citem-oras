<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?= base_url()?>form_shadow.css">
        <title>Admin Login | ORAS</title>
    </head>
    <body>
        <div class="container p-5">
            <div class="container-fluid p-5 mt-5 text-center rounded" id="form_shadow">
                <h5 class="mb-5">ORAS Admin Login</h5>
                <form action="<?= base_url()?>admin/login" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control text-center" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control text-center" name="pw" required>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </center>
                </form>
            </div>
        </div>
    </body>
</html>