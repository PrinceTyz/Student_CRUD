<?php
require 'config/dbcon.php';

if (isset($_POST['save_student'])) {
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $given_name = mysqli_real_escape_string($conn, $_POST['given_name']);
    $middle_initial = mysqli_real_escape_string($conn, $_POST['middle_initial']);
    $year_section = mysqli_real_escape_string($conn, $_POST['year_section']);
    $course = mysqli_real_escape_string($conn, $_POST['Course']);
    $address = mysqli_real_escape_string($conn, $_POST['address_loc']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);

    if ($surname == NULL || $given_name == NULL || $middle_initial == NULL || $year_section == NULL || $course == NULL || $address == NULL || $contact == NULL || $age == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    // File upload handling
    $image = $_FILES['photo']['name'];
    $path = "uploads/"; // Path for uploading your image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION); // Image extension
    $filename = time().'.'.$image_extension; // Renaming the image

    // Handling selected subjects
    $selected_subjects = isset($_POST['subjects']) ? $_POST['subjects'] : [];
    $subjects_str = implode(', ', $selected_subjects); // Convert array to comma-separated string

    $query = "INSERT INTO student_info (surname, given_name, middle_initial, year_section, course, address_loc, contact, age, photo, subjects) 
              VALUES ('$surname', '$given_name', '$middle_initial', '$year_section', '$course', '$address', '$contact', '$age', '$filename', '$subjects_str')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // Upload the image to the uploads folder
        move_uploaded_file($_FILES['photo']['tmp_name'], $path.$filename);

        $res = [
            'status' => 200,
            'message' => 'Student Created Successfully'
        ];
        echo json_encode($res);
        header("Location: index.php"); 
        exit();
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return;
    }
}
if (isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['edit_id']);
    $edit_surname = mysqli_real_escape_string($conn, $_POST['edit_surname']);
    $edit_given_name = mysqli_real_escape_string($conn, $_POST['edit_given_name']);
    $edit_middle_initial = mysqli_real_escape_string($conn, $_POST['edit_middle_initial']);
    $edit_year_section = mysqli_real_escape_string($conn, $_POST['edit_year_section']);
    $edit_course = mysqli_real_escape_string($conn, $_POST['edit_Course']);
    $edit_address = mysqli_real_escape_string($conn, $_POST['edit_address_loc']);
    $edit_contact = mysqli_real_escape_string($conn, $_POST['edit_contact']);
    $edit_age = mysqli_real_escape_string($conn, $_POST['edit_age']);

    // Handle subjects
    $edit_subjects = isset($_POST['edit_subjects']) ? $_POST['edit_subjects'] : array();
    $edit_subjects = array_map('mysqli_real_escape_string', array_fill(0, count($edit_subjects), $conn), $edit_subjects);
    $edit_subjects_str = implode(',', $edit_subjects);

    $path = "uploads/";
    $filename = '';

    if (isset($_FILES['edit_photo'])) {
        $image = $_FILES['edit_photo']['name'];
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_extension;
        move_uploaded_file($_FILES['edit_photo']['tmp_name'], $path . $filename);
    }

    // Prepare the update query using a prepared statement
    $query = "UPDATE student_info SET surname=?, given_name=?, middle_initial=?, year_section=?, course=?, address_loc=?, contact=?, age=?, subjects=?, photo=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssssssssi', $edit_surname, $edit_given_name, $edit_middle_initial, $edit_year_section, $edit_course, $edit_address, $edit_contact, $edit_age, $edit_subjects_str, $filename, $student_id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        $res = [
            'status' => 200,
            'message' => 'Student data updated successfully'
        ];
        echo json_encode($res);
        header("Location: index.php"); // Redirect to the appropriate page after successful update
        exit();
    } else {
        $res = [
            'status' => 500,
            'message' => 'Failed to update student data'
        ];
        echo json_encode($res);
        return;
    }
}


if (isset($_POST['deletedata'])) {
    $id = $_POST['delete_id'];
    // Assuming $connection is your database connection

    // Prepare and bind the statement
    $query = "DELETE FROM student_info WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location: index.php");
        exit;
    } else {
        echo '<script> alert("Data Not Deleted"); </script>';
    }

    // Close the statement
    $stmt->close();
}

if (isset($_GET['student_id'])) {
    $student_id = mysqli_real_escape_string($con, $_GET['student_id']);

    $query = "SELECT * FROM student_info WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Student Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['course'])) {
    

    $course = $_GET['course'];

    if ($course !== "All") {
        $query = "SELECT * FROM student_info WHERE course = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $course);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $query = "SELECT * FROM student_info";
        $result = mysqli_query($conn, $query);
    }

    $students = [];

    // Store the fetched data in an array
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }

    echo json_encode($students);
    return;
}

?>

