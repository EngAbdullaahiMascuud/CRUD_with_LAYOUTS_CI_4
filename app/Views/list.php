<?= $this->extend('layouts/base')?>
<?= $this->section('content')?>
<div class="container mt-3 ">
            <div class="row row justify-content-center mt-4">

                <h3 class="text-uppercase text-center m-4">Table sts Form</h3>
            </div>
            <div class="container m-5 shadow-lg rounded bg-light p-4 justify-content-center">
                <div style="text-align:end">
                <a href="<?= base_url("/add") ?>" class="btn btn-primary mt-4 ">Add Student</a>
                </div>
                <table class="table mt-4">
                <thead>
                    <tr class="text-uppercase">
                    <th>Id</th>
                    <th>ST Name</th>
                    <th>Gmail</th>
                    <th>Address</th>
                    <th>Actions</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php foreach ($sts as $student):?>
                    <tr>
                    <td><?php echo $student['id']?></td>
                    <td><?php echo $student['stid']?></td>
                    <td><?php echo $student['stname']?></td>
                    <td><?php echo $student['stclass']?></td>
                    
                
                    <td>
                        
                        <a href="<?= base_url('/edit/'. $student['id']) ?>" class="btn btn-warning">Edit</a>
                    
                        <a href="<?= base_url('/dalet/'. $student['id']) ?>" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                <div class="text-end">
                <a href="{% url 'logout' %}" class="btn btn-primary w-100">Log Out</a>
                </div> 
            </div>
 </div>
<?= $this->endSection('content')?>
