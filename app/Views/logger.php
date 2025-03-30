<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?= base_url()?>form_shadow.css">
        <title>Logger | ORAS</title>
    </head>
    <body>
        <div class="container p-5">
            <div class="container-fluid p-5 mt-5 text-center rounded" id="form_shadow">
                <h5 class="mb-4">ORAS</h5>
                <h1 class="mb-5"><span id="clock"></span></h1>

                <h5>Welcome,</h5>
                <h4><strong><?= $intern_name?></strong></h4>

                <?php if (!empty($dtr['time_in'])) { ?>
                    <h5>Time In: <strong><?= date('h:i A', strtotime($dtr['time_in'])) ?></strong></h5>
                <?php } ?>

                <?php if (empty($dtr['time_in']) || empty($dtr['time_out'])) { ?>

                    <form class="mt-5" action="<?= base_url()?>logger/<?= (empty($dtr['time_in'])) ? 'time_in' : 'time_out'?>" method="post">
                        <?php if(empty($dtr['time_in'])) { ?>
                            <input type="submit" class="btn btn-success" value="Time In">
                        <?php } else { ?> 
                            <div class="form-group">
                                <textarea class="form-control mb-3" name="task" rows="3" required placeholder="Please enter your task for today"></textarea>
                            </div>
                            <input type="submit" class="btn btn-danger" value="Time Out">
                        <?php } ?>
                    </form>

                <?php } else { ?>

                    <div class="alert alert-danger mt-3" role="alert">
                        <p class="mb-0">Please clock in on your next work day!</p>
                    </div>

                <?php } ?>

                <p class="text-sm">Accumulated Hours: <strong><?= $hours['hours']?></strong></p>
                <div class="row mt-5">
                    <div class="col"></div>
                    <div class="col-3">
                        <a href="<?= base_url()?>logout" class="btn btn-sm btn-secondary">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function updateClock() {
                const now = new Date();
                document.getElementById("clock").innerText = now.toLocaleTimeString();
            }
        
            setInterval(updateClock, 1000);
            updateClock();
        </script>
    </body>
</html>
