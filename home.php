<?php include "navbar.php" ?>

<div class="main-content">
    <div class="container" id="home">
        <h2 class="text-center pt-2 display-3">Profile</h2>
        <div class="not-updated d-none">
            <img src="img/Coffee-01.svg" alt="">
            <h3 class="text-center">Your Profile is not yet updated <a href="">Update here</a></h3>
        </div>
        <div class="updated mt-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="http://placehold.it/150x150" class="rounded-circle mx-auto d-block" />
                            <div class="text-center pt-3">
                                <h4>Barry</h4>
                                <h6 class="text-muted">Age: 23 Years</h6>
                                <h6 class="text-muted">Front-End Developer</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                <div class="card">
            <div class="card-body">
                <a class="btn btn-outline-info float-end"  data-toggle="modal" data-target="#editNameModal" href="">Edit</a><h6 class="font-weight-bold d-inline">Name:</h6><h6>Barry</h6>
                <hr>
                <a class="btn btn-outline-info float-end" data-toggle="modal" data-target="#editEmailModal" href="">Edit</a><h6 class="font-weight-bold">DOB:</h6><h6>27/10/1998</h6>
                <hr>
                <a class="btn btn-outline-info float-end" data-toggle="modal" data-target="#editMobileModal" href="">Edit</a><h6 class="font-weight-bold">Phone:</h6><h6>9738080613</h6>
                <hr>
                <a class="btn btn-outline-info float-end" data-toggle="modal" data-target="#editAddressModal" href="">Edit</a><h6 class="font-weight-bold">Email:</h6><h6>bharath@gmail.com</h6>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>