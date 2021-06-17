<?php require APPROOT . '/views/admin/inc/header.php'; ?>


<section class="container">
    <section class="exams col-md-12 mt-5 pt-5">

        <h2 class="display-4">All Exams</h2>

        <section class="row pt-5">
            <?php foreach ($data['exams'] as $exam) : ?>
                <div class="col-md-4">
                    <div class="card"><?= $exam->name ?></div>
                </div>
            <?php endforeach; ?>
        </section>
    </section>
</section>


<?php require APPROOT . '/views/admin/inc/footer.php'; ?>