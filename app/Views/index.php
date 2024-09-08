<?= $this->extend('layouts/base')?>
<?= $this->section('content')?>

<div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-sm-8">
                <!-- <h1>registration</h1> -->
                 <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Student Registration</h4>
                        <form action="<?= base_url("/store")?>" method="POST">
                            <div class="form-grooup m-2">
                                <!-- <label for="id">Student Id</label> -->
                                <input type="text" name="stid" value="<?php echo $edit['stid'] ?>"  class="form-control" id="id" placeholder="Enter Student Id">
                                <input type="text" name="id"  value="<?php  echo $edit['id'] ?>"   class="form-control" id="id" placeholder="Enter Student Id" hidden>
                            </div>
                            <div class="from-group m-2">
                                <!-- <label for="name">Student Name</label> -->
                                <input type="text" name="stname" value="<?php  echo $edit['stname'] ?>"  class="form-control" id="name" placeholder="Enter Student Name">
                            </div>
                            <div class="form-group m-2">
                                <!-- <label for="dob">Date of Birth</label> -->
                                <input type="text" name="stclass" value="<?php  echo $edit['stclass'] ?>"  class="form-control" id="" placeholder="Enter student Class">
                            </div>
                            <button name="insert" class="btn  btn-success m-2 " type="submit">Save Info</button>

                            <!-- <button name="update" class="btn  btn-info m-2 " type="submit">Update Info</button> -->

                        
                            
                        </form>

                    </div>
                 </div>
            </div>
        </div>

       
    </div>
<?= $this->endSection('content')?>
  