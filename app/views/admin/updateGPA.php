<?php require APPROOT . '/views/admin/inc/header.php'; ?>


<div class="container ">

    <div class="col-md-12">


        <div class="header-side pt-5 mt-5">
            <h1 class="display-4">Update GPA</h1>

            <hr>
        </div>





        <div class="col-md-12 ">
            <div class="card ">

                <div class="card-header pt-0 pb-0 bg-other-faint">
                    <h4>Update GPA</h4>
                </div>
                <div class="card-body p-0">
                    <div class="form p-5">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">GPA <sup>*</sup></label>
                                <input type="text" name="gpa" class="form-control form-control-lg" value="">
                                <span class="invalid-feedback"></span>
                            </div>


                            <div class="form-group">
                                <input type="submit" value="Update GPA" class="btn btn-primary btn-block col-6 p-3">
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?php require APPROOT . '/views/admin/inc/footer.php'; ?>