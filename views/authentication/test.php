<?php
if (isset($_SESSION['success'])) : ?>
    <div class="row">
        <div class="col-lg-12" col-lg-offset-3>
            <div class="alert alert-success alert-dismissable" role="alert">
                <div class="text-center">
                    <span class="glyphicon glyphicon-exclamation-sign" arial-hidden="true"></span>
                    <h6><?= $_SESSION['success'] ?></h6>
                </div>
            </div>
        </div>
    </div>
<?php unset($_SESSION['success']);
endif; ?>

<?php
if (isset($_SESSION['warning'])) : ?>
    <div class="row">
        <div class="col-lg-12" col-lg-offset-3>
            <div class="alert alert-warning alert-dismissable" role="alert">
                <div class="text-center">
                    <span class="glyphicon glyphicon-exclamation-sign" arial-hidden="true"></span>
                    <h6><?= $_SESSION['warning'] ?></h6>
                </div>
            </div>
        </div>
    </div>
<?php unset($_SESSION['warning']);
endif; ?>

<?php
if (isset($_SESSION['error'])) : ?>
    <div class="row">
        <div class="col-lg-12" col-lg-offset-3>
            <div class="alert alert-warning alert-dismissable" role="alert">
                <div class="text-center">
                    <span class="glyphicon glyphicon-exclamation-sign" arial-hidden="true"></span>
                    <h6><?= $_SESSION['error'] ?></h6>
                </div>
            </div>
        </div>
    </div>
<?php unset($_SESSION['error']);
endif; ?>