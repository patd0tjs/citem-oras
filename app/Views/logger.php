<?= $this->extend('template') ?>

<?= $this->section('content') ?>
    <div class="container p-5">
        <div class="container-fluid text-center rounded" id="form_shadow">
            <h1 class="mb-5"><span id="clock"></span></h1>

            <?php if (!empty($dtr['time_in'])) { ?>
                <h5>Time In: <strong><?= date('h:i A', strtotime($dtr['time_in'])) ?></strong></h5>
            <?php } ?>

            <?php if (empty($dtr['time_in']) || empty($dtr['time_out'])) { ?>

                <form class="mt-5" action="<?= base_url()?>logger/<?= (empty($dtr['time_in'])) ? 'time_in' : 'time_out'?>" method="post">
                    <?php if(empty($dtr['time_in'])) { ?>
                        <input type="submit" class="btn btn-success" value="Time In">
                    <?php } else { ?> 
                        <div class="form-group">
                            <textarea class="form-control mb-3" id="draftArea" name="task" rows="3" required placeholder="Please enter your task for today"><?= $dtr['draft']?></textarea>
                        </div>
                        <div id="saveStatus" class="text-muted small mb-3"></div>
                        <input type="submit" class="btn btn-danger" value="Time Out">
                    <?php } ?>
                </form>

            <?php } else { ?>

                <div class="alert alert-danger mt-3" role="alert">
                    <p class="mb-0">Please clock in on your next work day!</p>
                </div>

            <?php } ?>

            <p class="text-sm mt-3">Accumulated Hours: <strong><?= $hours['hours']?></strong></p>
        </div>
    </div>

    <script>
        function updateClock() {
            const now = new Date();
            document.getElementById("clock").innerText = now.toLocaleTimeString();
        }
        
        setInterval(updateClock, 1000);
        updateClock();

        $(document).ready(function () {
            $('#draftArea').on('keyup', function () {
                var content = $(this).val();
                $('#saveStatus').text('Saving draft...');

                $.ajax({
                    url: '<?= base_url() ?>saveDraft',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ content: content }),
                    success: function (response) {
                        if (response.status === 'success') {
                            $('#saveStatus').text('Draft saved!');
                        } else {
                            $('#saveStatus').text('Failed to save draft.');
                        }
                    },
                    error: function () {
                        $('#saveStatus').text('Error saving draft.');
                    }
                });
            });
        });
    </script>

<?= $this->endSection() ?>