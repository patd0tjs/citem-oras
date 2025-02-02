<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logger | ORAS</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
    <h2>Current Time: <span id="clock"></span></h2>
        <h1>Welcome, <?= $intern_name?></h1>

        <?php if (empty($dtr['time_in']) || empty($dtr['time_out'])){?>

            <form action="<?= base_url()?>logger/<?= (empty($dtr['time_in'])) ? 'time_in' : 'time_out'?>" method="post">
                <?php if(empty($dtr['time_in'])){?>
                    <input type="submit" value="Time In">
                <?php } else { ?> 
                    <div class="form-group">
                    <label for="exampleFormControlTextarea1">Please enter your task for today</label>
                    <textarea class="form-control" name="task" rows="3" required></textarea>
                    </div>
                    <input type="submit" value="Time Out">
                <?php } ?>
            </form>

        <?php } else {?>

            <h1>You have clocked out for today, please come back again tomorrow</h1>

        <?php } ?>

        <a href="<?= base_url()?>logout">Logout</a>
    </body>

    <script>
        function updateClock() {
            const now = new Date();
            document.getElementById("clock").innerText = now.toLocaleTimeString();
        }
    
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</html>