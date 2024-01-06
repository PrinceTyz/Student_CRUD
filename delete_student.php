<?php
require 'config/dbcon.php';
?>
          
                <form action="function.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="student_id" id="student_id" >
                    <div class="form-group">
                        <label for="edit_surname">Surname</label>
                        <input type="text" class="form-control" id="edit_surname" name="edit_surname" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_given_name">Given Name</label>
                        <input type="text" class="form-control" id="edit_given_name" name="edit_given_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_middle_initial">Middle Initial</label>
                        <input type="text" class="form-control" id="edit_middle_initial" name="edit_middle_initial" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_year_section">Year & Section</label>
                        <input type="text" class="form-control" id="edit_year_section" name="edit_year_section" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_course">Course</label>
                        <input type="text" class="form-control" id="edit_course" name="edit_course" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_photo">Photo</label>
                        <input type="file" class="form-control" id="edit_photo" name="edit_photo">
                    </div>
                    <div class="form-group">
                        <label for="edit_address">Address</label>
                        <input type="text" class="form-control" id="edit_address" name="edit_address" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_contact">Contact</label>
                        <input type="text" class="form-control" id="edit_contact" name="edit_contact" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_age">Age</label>
                        <input type="number" class="form-control" id="edit_age" name="edit_age" required>
                    </div>
                    <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
