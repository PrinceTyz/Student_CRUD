<?php
require 'config/dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IEAT STUDENT INFORMATION SYSTEM</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" />

</head>

<body>
  <!-- Add Student Modal -->
  <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="function.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="subjects">Subjects Enrollment</label><br>
              <input type="checkbox" name="subjects[]" value="Computer Programming 1"> IT 201
              <input type="checkbox" name="subjects[]" value="Web Development"> IT 202
              <input type="checkbox" name="subjects[]" value="Data Structures and Algorithms"> IT 101
              <input type="checkbox" name="subjects[]" value="Fundamentals of Database Systems"> IT 103
              <input type="checkbox" name="subjects[]" value="Discrete Mathematics for ITE"> IT 302
              <input type="checkbox" name="subjects[]" value="Information Management"> IT 301
              <input type="checkbox" name="subjects[]" value="Human Computer Interaction"> IT 104
              <input type="checkbox" name="subjects[]" value="Systems Integration and Architecture"> IT 205
              <input type="checkbox" name="subjects[]" value="Networking 2"> IT 401
              <input type="checkbox" name="subjects[]" value="Multimedia Systems"> IT 402
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="surname">Surname</label>
                  <input type="text" class="form-control" id="surname" name="surname" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="given_name">Given Name</label>
                  <input type="text" class="form-control" id="given_name" name="given_name" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="middle_initial">Middle Initial</label>
                  <input type="text" class="form-control" id="middle_initial" name="middle_initial" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="year_section">Year & Section</label>
                  <input type="text" class="form-control" id="year_section" name="year_section" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="Course">Course</label>
              <input type="text" class="form-control" id="Course" name="Course" required>
            </div>
            <div class="form-group">
              <label for="photo">Photo</label>
              <input type="file" class="form-control" id="photo" name="photo" required>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address_loc" required>
            </div>
            <div class="form-group">
              <label for="contact">Contact</label>
              <input type="text" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="form-group">
              <label for="age">Age</label>
              <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <button type="submit" name="save_student" class="btn btn-primary">Save</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Student Modal -->
  <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="function.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_surname">Surname</label>
                  <input type="text" class="form-control" id="edit_surname" name="edit_surname" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_given_name">Given Name</label>
                  <input type="text" class="form-control" id="edit_given_name" name="edit_given_name" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_middle_initial">Middle Initial</label>
                  <input type="text" class="form-control" id="edit_middle_initial" name="edit_middle_initial" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_year_section">Year & Section</label>
                  <input type="text" class="form-control" id="edit_year_section" name="edit_year_section" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="edit_Course">Course</label>
              <input type="text" class="form-control" id="edit_Course" name="edit_Course" required>
            </div>
            <div class="form-group">
              <label for="edit_subjects">Subjects</label><br>
              <?php
              // Assuming $allSubjects is an array of all subjects
              $allSubjects = array(
                "Computer Programming 1",
                "Computer Programming 2",
                "Data Structures and Algorithms",
                "Fundamentals of Database Systems",
                "Discrete Mathematics for ITE",
                "Information Management",
                "Human Computer Interaction",
                "Systems Integration and Architecture",
                "Networking 2",
                "Multimedia Systems"
              );

              foreach ($allSubjects as $subject) {
                echo '<input type="checkbox" name="edit_subjects[]" value="' . $subject . '"> ' . $subject . '<br>';
              }
              ?>
            </div>
            <div class="form-group">
              <label for="edit_photo">Photo</label>
              <input type="file" class="form-control" id="edit_photo" name="edit_photo">
            </div>
            <div class="form-group">
              <label for="edit_address">Address</label>
              <input type="text" class="form-control" id="edit_address" name="edit_address_loc" required>
            </div>
            <div class="form-group">
              <label for="edit_contact">Contact</label>
              <input type="text" class="form-control" id="edit_contact" name="edit_contact" required>
            </div>
            <div class="form-group">
              <label for="edit_age">Age</label>
              <input type="number" class="form-control" id="edit_age" name="edit_age" required>
            </div>
            <button type="submit" name="update_student" class="btn btn-primary">Update</button>
            <input type="hidden" name="edit_id" id="edit_id">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Student Details Modal -->
  <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="studentModalLabel">Student Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><strong>ID:</strong> <span id="studentId"></span></p>
          <p><strong>Surname:</strong> <span id="studentSurname"></span></p>
          <p><strong>Given Name:</strong> <span id="studentGivenName"></span></p>
          <p><strong>Middle Initial:</strong> <span id="studentMiddleInitial"></span></p>
          <p><strong>Year & Section:</strong> <span id="studentYearSection"></span></p>
          <p><strong>Course:</strong> <span id="studentCourse"></span></p>
          <p><strong>Subjects enrolled:</strong> <span id="studentSubjects"></span></p>
          <p><strong>Address:</strong> <span id="studentAddress"></span></p>
          <p><strong>Contact:</strong> <span id="studentContact"></span></p>
          <p><strong>Age:</strong> <span id="studentAge"></span></p>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-dark sidebar sticky-top">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item mt-3">
              <a class="nav-link text-center text-white" href="#">
                <i class="fas fa-info-circle"></i> About Us
              </a>
              <a class="nav-link text-center text-white" href="#">
                <i class="fas fa-phone-alt"></i> Contact Us
              </a>
            </li>
            <hr>
            <img class="img-fluid d-flex justify-content-center mx-auto" style="max-width: 120px;" src="assets/BASC-logo.png" alt="Your Logo">
            <li class="nav-item">
              <p class="text-white text-center">IEAT</p>
              <?php
              $query = "SELECT course, COUNT(*) as count FROM student_info GROUP BY course";
              $result = mysqli_query($conn, $query);

              $courses = [];
              while ($row = mysqli_fetch_assoc($result)) {
                $courses[$row['course']] = $row['count'];
              }


              foreach ($courses as $course => $count) {
                $percentage = ($count / array_sum($courses)) * 100;
                $color = "";
                if ($percentage < 25) {
                  $color = "bg-danger";
                } elseif ($percentage < 50) {
                  $color = "bg-warning";
                } elseif ($percentage < 75) {
                  $color = "bg-info";
                } else {
                  $color = "bg-success";
                }
                echo '<div class="progress my-3">';
                echo '<div class="progress-bar ' . $color . '" role="progressbar" style="width: ' . $percentage . '%;" aria-valuenow="' . $percentage . '" aria-valuemin="0" aria-valuemax="100">' . $course . ' - ' . $count . '</div>';
                echo '</div>';
              }
              ?>
            </li>
          </ul>
        </div>
        <hr>
        <footer>
        <a class="btn btn-danger" href="admin_page.php">
  <i class="fas fa-sign-out-alt"></i> Log Out
</a>
        </footer>
      </nav>


      <main role="main" class="col-md-10 ml-sm-auto col-lg-10">
      <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
            <a class="navbar-brand text-white" href="#">
                <i class="fas fa-home"></i> Home
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-history"></i> History of IEAT
                        </a>
                    </li>
                </ul>
                <div class="form-inline">
                    <label for="filterCourse" class="text-white mr-2">Courses:</label>
                    <select class="form-control" id="filterCourse" onchange="filterStudents(this.value)">
                        <option value="All">All</option>
                        <option value="BSABEN">BSABEN</option>
                        <option value="BSGE">BSGE</option>
                        <option value="BSFT">BSFT</option>
                        <option value="BSIT">BSIT</option>
                    </select>
                </div>
            </div>
        </nav>


        <div class="container-fluid bg-danger my-3 p-4">
          <div class="row">
            <div class="col-md-1 d-none d-md-block">
              <!-- Column 1: Logo -->
              <img class="img-fluid" style="max-width: 100px;" src="assets/ieat.jpg" alt="Your Logo">
            </div>
            <div class="col-md-11 text-center">
              <!-- Column 2: Title -->
              <h5 class="text-light mt-3 mt-md-0">Institute of Engineering and Applied Technology<br>
                <span class="font-weight-normal">Bulacan State Agricultural University</span>
              </h5>
            </div>
          </div>
        </div>
  
        <div class="h3 text-center my-5">List of Students</div>
        <div class="container mt-5">
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addStudentModal">
            Add New Student
          </button>

          <table id="myTable" class="table table-bordered table-striped">
            <thead>
              <tr class="bg-warning">
                <th>ID</th>
                <th>Surname</th>
                <th>Given Name</th>
                <th>Middle Initial</th>
                <th>Year & Section</th>
                <th>Photo</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $query = "SELECT * FROM student_info";
              $query_run = mysqli_query($conn, $query);

              if (mysqli_num_rows($query_run) > 0) {
                while ($student = mysqli_fetch_assoc($query_run)) {
              ?>
                  <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= $student['surname'] ?></td>
                    <td><?= $student['given_name'] ?></td>
                    <td><?= $student['middle_initial'] ?></td>
                    <td><?= $student['year_section'] ?></td>
                    <td>
                      <a href="#" class="student-photo-link" onclick="showStudentInfo(event, <?= htmlspecialchars(json_encode($student), ENT_QUOTES, 'UTF-8') ?>)">
                        <img src="<?= 'uploads/' . $student['photo'] ?>" alt="Student Photo" style="width: 100px; height: 100px;" class="rounded-circle">


                      </a>

                    </td>

                    <td>
                      <form action="function.php" method="post">
                        <button type="button" class="editbtn btn btn-success btn-sm" data-toggle="modal" data-target="#studentEditModal" data-studentid="<?= $student['id'] ?>">
                          <i class="fas fa-edit"></i> Edit
                        </button>
                        <input type="hidden" name="delete_id" value="<?php echo $student['id']; ?>">
                        <input type="hidden" name="table" value="student_info">
                        <button type="submit" name="deletedata" class="btn btn-outline-danger btn-sm" onclick="return confirm('Sigurado kaba na gusto mong alisin ang iyong record :))')">
                          <i class="fas fa-trash-alt"></i> Delete
                        </button>
                      </form>

                    </td>
                  </tr>
              <?php
                }
              }
              ?>

            </tbody>
          </table>
        </div>

      </main>
    </div>
  </div>



  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
  <!-- DataTables JS and CSS from CDN -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>



<!-- Your script with defer attribute -->
<script defer>
    $(document).ready(function() {
        $('#myTable').on('click', '.editbtn', function() {
            var tr = $(this).closest('tr');
            var data = tr.find('td').map(function() {
                return $(this).text();
            }).get();

            // Set the values in the edit form
            $('#edit_id').val(data[0]);
            $('#edit_surname').val(data[1]);
            $('#edit_given_name').val(data[2]);
            $('#edit_middle_initial').val(data[3]);
            $('#edit_year_section').val(data[4]);
            $('#edit_Course').val(data[5]); // Make sure this field exists in the table
            $('#edit_address').val(data[6]);
            $('#edit_contact').val(data[7]);
            $('#edit_age').val(data[8]);

            // Call function to populate subjects
            populateSubjects(data);

            // Show the edit modal
            $('#editStudentModal').modal('show');
        });

        // Handling the update_student form submission
        $('#update_student_form').submit(function(e) {
            e.preventDefault();

            // Collect data from the form
            var formData = new FormData(this);

            // Make an AJAX request to update the student
            $.ajax({
                type: 'POST',
                url: 'function.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                    // You may want to update the table or perform other actions on success
                },
                error: function(error) {
                    console.error("Error:", error);
                }
            });

            // Hide the modal after submission
            $('#editStudentModal').modal('hide');
        });

        // ... (rest of your code)

        // Function to populate subjects in the edit modal
        function populateSubjects(data) {
            // Uncheck all checkboxes initially
            $('input[name="edit_subjects[]"]').prop('checked', false);

            // Get the subjects associated with the student
            var studentSubjects = data.slice(10); // Adjust the index based on your data structure

            // Check the checkboxes based on the subjects associated with the student
            $('input[name="edit_subjects[]"]').each(function(index) {
                if (studentSubjects.includes($(this).val())) {
                    $(this).prop('checked', true);
                }
            });
        }
    });
    
    function filterStudents(course) {
      $.ajax({
        type: "GET",
        url: "function.php",
        data: {
          course: course
        },
        success: function(response) {
          var students = JSON.parse(response);
          updateTable(students);
        },
        error: function(error) {
          console.error("Error:", error);
        }
      });
    }
    function updateTable(students) {
      var tableBody = $('#myTable tbody');
      tableBody.empty();

      students.forEach(function(student) {
        var row = "<tr><td>" + student.id + "</td><td>" + student.surname + "</td><td>" + student.given_name + "</td><td>" + student.middle_initial + "</td><td>" + student.year_section + "</td><td><img src='uploads/" + student.photo + "' alt='Student Photo' style='width: 100px; height: 100px;' class='rounded-circle'></td><td><form action='function.php' method='post'><button type='button' class='editbtn btn btn-success btn-sm' data-toggle='modal' data-target='#studentEditModal' data-studentid='" + student.id + "'>Edit</button><input type='hidden' name='delete_id' value='" + student.id + "'><input type='hidden' name='table' value='student_info'><button type='submit' name='deletedata' class='btn btn-outline-danger btn-sm' onclick='return confirm(`Sigurado kaba na gusto mong alisin ang iyong record :))`'>Delete</button></form></td></tr>";
        tableBody.append(row);
      });
    }
</script>


  <script>
    function showStudentInfo(event, student) {
      event.preventDefault();

      $('#studentId').text(student.id);
      $('#studentSurname').text(student.surname);
      $('#studentGivenName').text(student.given_name);
      $('#studentMiddleInitial').text(student.middle_initial);
      $('#studentYearSection').text(student.year_section);
      $('#studentCourse').text(student.course);

      // Split subjects by comma and create an unordered list
      var subjectsArray = student.subjects.split(',');
      var subjectsList = '<ul>';
      subjectsArray.forEach(function(subject, index) {
        subjectsList += '<li>' + (index + 1) + '. ' + subject + '</li>';
      });
      subjectsList += '</ul>';

      $('#studentSubjects').html(subjectsList);

      $('#studentAddress').text(student.address_loc);
      $('#studentContact').text(student.contact);
      $('#studentAge').text(student.age);

      $('#studentModal').modal('show');
    }
    
  </script>


</body>

</html>
<style>
  .sidebar {
    height: 100vh;
  }
  .progress-container {
        width: 70%;
        margin: auto;
    }

    .progress {
        height: 30px;
        margin-bottom: 15px;
    }

    .progress-bar {
        text-align: center;
        line-height: 30px;
        font-weight: bold;
        color: #fff;
    }
</style>