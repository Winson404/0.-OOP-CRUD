<title>TEMPLATE SYSTEM | Administrator records</title>
<?php 
    // Include the navbar.php file that contains the navigation bar code
    include 'navbar.php';

    // Require the function_display.php file that contains the User class definition
    require_once '../includes/function_display.php';

    // Retrieve all records from the "users" table
    $sql = $dbConnection->getConnection()->query("SELECT * FROM users");

    // Check if the SQL query execution was successful
    if ($sql === false) {
        // If an error occurred, display the error message and terminate the script
        die('Error executing the SQL query: ' . $dbConnection->getConnection()->error);
    }
    
    // Create an empty array to store User objects
    $users = array();

    // Loop through each row fetched from the SQL query result
    while ($row = mysqli_fetch_array($sql)) {
        // Create a new User object with the fetched row data
        $user = new User(
            $row['user_Id'],
            $row['firstname'],
            $row['middlename'],
            $row['lastname'],
            $row['suffix'],
            $row['dob'],
            $row['age'],
            $row['birthplace'],
            $row['gender'],
            $row['civilstatus'],
            $row['occupation'],
            $row['religion'],
            $row['email'],
            $row['contact'],
            $row['house_no'],
            $row['street_name'],
            $row['purok'],
            $row['zone'],
            $row['barangay'],
            $row['municipality'],
            $row['province'],
            $row['region'],
            $row['image'],
            $row['user_type'],
            $row['date_registered']
        );

        // Add the created User object to the users array
        $users[] = $user;
    } 
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Administrator records</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Administrator records</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <a href="admin_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Administrator</a>

                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-3">

                 <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                      <tr> 
                          <th>PHOTO</th>
                          <th>FULL NAME</th>
                          <th>GENDER</th>
                          <th>CONTACT DETAILS</th>
                          <th>USERTYPE</th>
                          <th>DATE REGISTERED</th>
                          <th>TOOLS</th>
                      </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php foreach ($users as $user): ?>
                      <tr>
                          <td>
                              <a data-toggle="modal" data-target="#viewphoto<?php echo $user->getUserId(); ?>">
                                  <img src="../<?php echo $user->getImage(); ?>" alt="" width="25" height="25" class="img-circle d-block m-auto">
                              </a href="">
                          </td>
                          <td><?php echo ' '.$user->getFullName(); ?></td>
                          <td><?php echo $user->getGender(); ?></td>
                          <td>
                              <?php echo '<b>Email:</b> ' . $user->getEmail(); ?> <br>
                              <?php if($user->getContact() !== '') { echo '<b>Phone:</b> +63' . $user->getContact(); } ?>
                          </td>
                          <td>
                              <span class="badge badge-<?php echo $user->getUserType() === 'Admin' ? 'primary' : 'success'; ?> p-1">
                                  <?php echo $user->getUserType(); ?>
                              </span>
                          </td>
                          <td><?php echo date("F d, Y h:i A", strtotime($user->getDateRegistered())); ?></td>
                          <td>
                              <a class="btn btn-primary btn-xs" href="admin_view.php?user_Id=<?php echo $user->getUserId(); ?>">
                                  <i class="fa-solid fa-eye"></i> View
                              </a>
                              <a class="btn btn-info btn-xs" href="admin_mgmt.php?page=<?php echo $user->getUserId(); ?>">
                                  <i class="fas fa-pencil-alt"></i> Edit
                              </a>
                              <button type="button" class="btn bg-danger btn-xs" data-toggle="modal" data-target="#delete<?php echo $user->getUserId(); ?>">
                                  <i class="fas fa-trash"></i> Delete
                              </button>
                              <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#password<?php echo $user->getUserId(); ?>">
                                  <i class="fa-solid fa-lock"></i> Security
                              </button>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 
  </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include '../includes/footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->

