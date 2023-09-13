<title>TEMPLATE SYSTEM | Register</title>
<?php include 'navbar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">

          <div class="col-lg-10 mt-5">
            <form action="processes.php" method="POST" enctype="multipart/form-data">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>Registration</b></a>
              </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12 mt-1 mb-2">
                          <a class="h5 text-primary"><b>Basic information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>First name</b></span>
                              <input type="text" class="form-control"  placeholder="First name" name="firstname" autocomplete="off" required onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                        <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Middle name</b></span>
                              <input type="text" class="form-control"  placeholder="Middle name" name="middlename" autocomplete="off" onkeyup="lettersOnly(this)">
                          </div>
                        </div>
                        <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Last name</b></span>
                              <input type="text" class="form-control"  placeholder="Last name" name="lastname" autocomplete="off" required onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Ext/Suffix</b></span>
                            <input type="text" class="form-control"  placeholder="Ext/Suffix" name="suffix" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Date of Birth</b></span>
                              <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" autocomplete="off" onchange="calculateAge()">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Age</b></span>
                              <input type="text" class="form-control bg-white" placeholder="Age" required id="txtage" name="age" readonly autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Place of Birth</b></span>
                              <textarea name="birthplace" id="" cols="30" rows="1" class="form-control" required placeholder="Place of Birth" autocomplete="off" ></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Sex</b></span>
                            <select class="form-control" name="gender" required>
                              <option selected disabled value="">Select sex</option>
                              <?php
                                $genders = array( 'Male', 'Female');
                                foreach ($genders as $gender) {
                                  echo "<option value=\"$gender\">$gender</option>";
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Civil Status</b></span>
                            <select class="form-control" name="civilstatus" required>
                              <option selected disabled value="">Select status</option>
                              <?php
                                $statuses = array( 'Single', 'Married', 'Widow/ER', 'Separated');
                                foreach ($statuses as $status) {
                                  echo "<option value=\"$status\">$status</option>";
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Profession/ Occupation</b></span>
                              <input type="text" class="form-control"  placeholder="Profession/ Occupation" name="occupation" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Religion</b></span>
                            <select class="form-control" name="religion" required>
                              <option selected disabled value="">Select religion</option>
                              <?php
                              $religions = array(
                                'Roman Catholic', 'Iglesia Ni Cristo', 'Evangelical Christianity', 'Islam', 'Protestants', 'Seventh-day Adventism', 'Aglipayan', 'Bible Baptist Church', 'United Church of Christ in the Philippines', "Jehovah's Witnesses", 'Buddhist', 'Methodist', 'Hindu', 'Judaism', 'Ang Dating Daan', 'Other Religion'
                              );

                              foreach ($religions as $religion) {
                                echo "<option value=\"$religion\">$religion</option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>Contact details</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Email</b></span>
                            <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email" onkeyup="checkEmail()" required autocomplete="off" >
                            <small id="email-error" style="font-style: italic;font-size: 12px;color: #e60000; font-weight: bold;"></small>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Contact number</b></span>
                              <div class="input-group">
                                <div class="input-group-text">+63</div>
                                <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" autocomplete="off" required maxlength="10">
                              </div>
                            </div>
                        </div>
                        

                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>Complete ddress</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>House No.</b></span>
                              <input type="text" class="form-control"  placeholder="House No." name="house_no" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Street name</b></span>
                              <input type="text" class="form-control"  placeholder="Street name" name="street_name" autocomplete="off">
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Sitio/Purok</b></span>
                              <input type="text" class="form-control"  placeholder="Sitio/Purok" name="purok" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Zone</b></span>
                              <input type="text" class="form-control"  placeholder="Zone" name="zone" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Barangay</b></span>
                              <input type="text" class="form-control"  placeholder="Barangay" name="barangay" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Municipality</b></span>
                              <input type="text" class="form-control"  placeholder="Municipality" name="municipality" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Province</b></span>
                              <input type="text" class="form-control"  placeholder="Province" name="province" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Region</b></span>
                              <input type="text" class="form-control"  placeholder="Region" name="region" autocomplete="off" required>
                            </div>
                        </div>



                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>Account password</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Password</b></span>
                              <input type="password" id="password" class="form-control" name="password" placeholder="Password" minlength="8" autocomplete="off" required>
                              <span id="password-message" class="text-bold" style="font-style: italic;font-size: 12px;color: #e60000;"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Confirm password</b></span>
                              <input type="password" class="form-control" name="cpassword" placeholder="Retype password" id="cpassword" onkeyup="validate_password()" autocomplete="off" minlength="8" required>
                              <small id="wrong_pass_alert" class="text-bold" style="font-style: italic;font-size: 12px;"></small>
                            </div>
                        </div>


                        <div class="col-lg-12 mt-3 mb-2">
                          <a class="h5 text-primary"><b>Additional information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        
                        <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Upload photo</b></span>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="getImagePreview(event)" required>
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>

                              </div>
                              <p class="help-block text-danger">Max. 500KB</p>
                            </div>
                        </div>
                         <!-- LOAD IMAGE PREVIEW -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="form-group" id="preview">
                            </div>
                        </div>
                        <div class="col-12">
                          <hr>
                          <p>Already have an account? <a href="login.php">Click here!</a></p>
                        </div>

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <button type="submit" class="btn bg-primary" name="create_user" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->
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
<?php include 'footer.php'; ?>
<script>
  function checkEmail() {
    const emailInput = document.getElementById('email');
    const errorElement = document.getElementById('email-error');
    const submitButton = document.getElementById('submit_button');
    const email = emailInput.value.trim();

    if (email !== '') {
      // Check if email has the correct extension
      if (email.endsWith('@gmail.com')) {
        $.ajax({
          url: "includes/checkEmail.php",
          type: "POST",
          data: { email },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.exists) {
              errorElement.textContent = 'Email already exists.';
              submitButton.disabled = true; // Disable the submit button
            } else {
              errorElement.textContent = '';
              submitButton.disabled = false; // Enable the submit button
            }
          },
          error: function() {
            errorElement.textContent = 'Error checking email.';
          }
        });
      } else {
        errorElement.textContent = 'Email must have "@gmail.com" extension.';
        submitButton.disabled = true; // Disable the submit button
      }
    } else {
      errorElement.textContent = '';
      submitButton.disabled = false; // Enable the submit button
    }
  }
</script>