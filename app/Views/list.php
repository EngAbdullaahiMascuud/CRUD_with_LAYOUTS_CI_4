<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?= $this->extend('layouts/base')?>
<?= $this->section('content')?>
<div class="container mt-3">
    <div class="row justify-content-center mt-4">
        <h3 class="text-uppercase text-center m-4">Table sts Form</h3>
    </div>
    <div class="container m-5 shadow-lg rounded bg-light p-4 justify-content-center">
        <div style="text-align:start">
            <a href="<?= base_url('/add') ?>" class="btn btn-primary mt-4">Add Student</a>
        </div>
        <!-- <div class="container m-2">
            <input type="text" class="form-control" id="search" name="search" placeholder="Enter Search_Name">
        </div> -->
        <div id="search-results"></div>
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
                <?php foreach ($sts as $student): ?>
                <tr>
                    <td><?php echo $student['id'] ?></td>
                    <td><?php echo $student['stid'] ?></td>
                    <td><?php echo $student['stname'] ?></td>
                    <td><?php echo $student['stclass'] ?></td>
                    <td>
                        <a href="<?= base_url('/edit/'. $student['id']) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('/delete/'. $student['id']) ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-end">
            <a href="<?= base_url('home/logout') ?>" class="btn btn-primary w-100">Log Out</a>
        </div> 
    </div>
</div>
<script>
    $(document).ready(function(){
        alert('You have successfully logged in');
        
        $('#search').on('keyup', function(){
            var query = $(this).val(); // Get the search input

            $.ajax({
                url: '<?= base_url('/list') ?>', // Adjust this to your actual controller/method
                method: 'GET',
                data: { search: query },
                success: function(data) {
                    // Clear previous results
                    $('#search-results').empty();
                    
                    // Check if data is an array
                    if (Array.isArray(data)) {
                        // Display new results
                        if (data.length > 0) {
                            $.each(data, function(index, item){
                                $('#search-results').append('<p>'+item.stname+' ('+item.stid+')</p>');
                            });
                        } else {
                            $('#search-results').append('<p>No results found</p>');
                        }
                    } else {
                        $('#search-results').append('<p>Error retrieving results</p>');
                    }
                },
                error: function() {
                    $('#search-results').html('<p>Error retrieving results</p>');
                }
            });
        });
    });
</script>

<?= $this->endSection('content')?>
