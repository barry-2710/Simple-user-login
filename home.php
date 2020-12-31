<?php 
include "db.php";
include "navbar.php";
include "auth.php";
$id = $_SESSION['user_id'];
$query = $db->prepare("SELECT * from users WHERE id = $id");
$query->execute();
if($query->rowCount() > 0){
    $row = $query->fetch(PDO::FETCH_OBJ);
    $user_name = $row->name;
    $email = $row->email;
    $phone = $row->phone;
    $dob = $row->dob;
    $profession = $row->profession;
}
    $from = new DateTime($dob);
    $to   = new DateTime('today');
    $age =  $from->diff($to)->y;
    if(empty($dob)){
        $updated = false;
    }
    else{
        $updated = true;
    }
?>

<div class="main-content">
    <div class="container" id="home">
        <h2 class="text-center pt-2 display-3">Welcome <?php echo $user_name; ?></h2>
        <div class="not-updated <?php if($updated){ echo "d-none"; } ?>">
            <img src="img/Coffee-01.svg" alt="">
            <h3 class="text-center">Your Profile is not updated completely <a href="#" data-bs-toggle="modal" data-bs-target="#profile_modal">Update now</a></h3>
        </div>
        <div class="updated mt-5 <?php if(!$updated){ echo "d-none"; } ?>">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="img/profile-1.png" class="rounded-circle mx-auto d-block" />
                            <div class="text-center pt-3">
                                <h4><?php echo $user_name; ?></h4>
                                <h6 class="text-muted">Age: <?php echo $age; ?> Years</h6>
                                <h6 class="text-muted"><?php echo $profession; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="d-grid gap-2">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit Profile</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="font-weight-bold d-inline">Name:</h6><h6><?php echo $user_name; ?></h6>
                            <hr>
                            <h6 class="font-weight-bold">DOB:</h6><h6><?php echo $dob; ?></h6>
                            <hr>
                            <h6 class="font-weight-bold">Phone:</h6><h6><?php echo $phone; ?></h6>
                            <hr>
                            <h6 class="font-weight-bold">Email:</h6><h6><?php echo $email; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="profile_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hey <?php echo $_SESSION['user_name']; ?>, update your profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="mb-3">
                    <div class="invalid-feedback Error" style="font-size:16px;"></div>
                </div>
                    <div class="mb-3">
                        <label for="Dob" class="form-label">DOB</label>
                        <input type="date" class="form-control dob" name="dob" id="Dob">
                        <div class="invalid-feedback dobError" style="font-size:16px;">DOB is required</div>
                    </div>
                    <div class="mb-3">
                        <label for="Profession" class="form-label">Profession</label>
                        <input type="text" class="form-control profession" name="profession" id="Profession">
                        <div class="invalid-feedback professionError" style="font-size:16px;">Profession is required</div>
                    </div>
                    <input type='hidden' name='user_id' id="User_id" value='<?php echo $id; ?>'>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="update_profile" class="btn btn-primary">Update</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Edit Name Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hey <?php echo $_SESSION['user_name']; ?>, update your profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="mb-3">
                    <div class="invalid-feedback Error" style="font-size:16px;"></div>
                </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control name" name="name" id="Name" value="<?php echo $user_name; ?>" aria-describedby="emailHelp">
                        <div class="invalid-feedback" style="font-size:16px;">Name is required</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control email" name="email" value="<?php echo $email; ?>" id="Email" aria-describedby="emailHelp">
                        <div class="invalid-feedback emailError" style="font-size:16px;">Email is required</div>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone</label>
                        <input type="number" class="form-control phone" value="<?php echo $phone; ?>" name="phone" id="Phone">
                        <div class="invalid-feedback" style="font-size:16px;">Phone is required</div>
                    </div>
                    <div class="mb-3">
                        <label for="Dob" class="form-label">DOB</label>
                        <input type="date" class="form-control dob"  value="<?php echo $dob; ?>" name="dob" id="Dob2">
                        <div class="invalid-feedback" style="font-size:16px;">DOB is required</div>
                    </div>
                    <div class="mb-3">
                        <label for="Profession" class="form-label">Profession</label>
                        <input type="text" class="form-control profession" value="<?php echo $profession; ?>" name="profession" id="Profession2">
                        <div class="invalid-feedback"  style="font-size:16px;">Profession is required</div>
                    </div>
                    <input type='hidden' name='user_id' id="User_id" value='<?php echo $id; ?>'>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="edit_profile" class="btn btn-primary">Update</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>