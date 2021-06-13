<?php
/** @var $model \app\models\Users */
/** @var $this \app\core\View */
$this->title = 'Student Register';
?>
<h1>Student Registration</h1>
<?php $form = \app\core\forms\Forms::begin('', 'post' )?>
    <div class = "row">
        <div class="col"> <?php echo $form->field($model, 'firstname')?></div>

        <div class="col"> <?php echo $form->field($model, 'lastname')?></div>
    </div>
    <?php echo $form->field($model, 'department')?>
    <?php echo new \app\core\forms\DropdownField($model, 'section', ["A","B","C","D"])?>
    <?php echo $form->field($model, 'rollno')?>
    <?php echo $form->field($model, 'email')?>
    <?php echo $form->field($model, 'password')->typePassword() ?>
    <?php echo $form->field($model, 'ConfirmPassword')->typePassword() ?>


    <button type="submit" id="submitbtn" class="btn btn-primary">Submit</button>
<?php echo \app\core\forms\Forms::end()?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#firstnamecheck').hide();
            $('#lastnamecheck').hide();
            $('#departmentcheck').hide();
            $('#sectioncheck').hide();
          //  $('#emailcheck').hide();
            $('#passwordcheck').hide();
            $('#ConfirmPasswordcheck').hide();
            $('#rollnocheck').hide();

            var err = false;


            $('#firstname').keyup(function(){
                firstname_check();
            });
            $('#lastname').keyup(function(){
                lastname_check();
            });
            $('#department').keyup(function(){
                department_check();
            });

            $('#rollno').keyup(function(){
                rollno_check();
            });
            $('#email').keyup(function(){
                email_check();
            });
            $('#password').keyup(function(){
                password_check();
                ConfirmPassword_check();
            });
            $('#ConfirmPassword').keyup(function(){
                ConfirmPassword_check();
                password_check();
            });

            function firstname_check(){
                var firstname_val = $('#firstname').val();
               // alert(firstname_val);
                if(firstname_val.length == '') {
                    $('#firstnamecheck').show();
                    $('#firstnamecheck').html("This field is required");
                    $('#firstnamecheck').focus();
                    $('#firstnamecheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#firstnamecheck').hide();

                }
                if(firstname_val.length < 3 ) {
                    $('#firstnamecheck').show();
                    $('#firstnamecheck').html("First Name length is too short");
                    $('#firstnamecheck').focus();
                    $('#firstnamecheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#firstnamecheck').hide();

                }

                if(firstname_val.length > 10 ) {
                    $('#firstnamecheck').show();
                    $('#firstnamecheck').html("First Name length is too large");
                    $('#firstnamecheck').focus();
                    $('#firstnamecheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#firstnamecheck').hide();

                }
            }
            function lastname_check(){
                var lastname_val = $('#lastname').val();

                if(lastname_val.length == '') {
                    $('#lastnamecheck').show();
                    $('#lastnamecheck').html("This field is required");
                    $('#lastnamecheck').focus();
                    $('#lastnamecheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#lastnamecheck').hide();

                }
                if(lastname_val.length < 3 ) {
                    $('#lastnamecheck').show();
                    $('#lastnamecheck').html("Last Name length is too short");
                    $('#lastnamecheck').focus();
                    $('#lastnamecheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#lastnamecheck').hide();

                }

                if(lastname_val.length > 10 ) {
                    $('#lastnamecheck').show();
                    $('#lastnamecheck').html("Last Name length is too large");
                    $('#lastnamecheck').focus();
                    $('#lastnamecheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#lastnamecheck').hide();

                }
            }

            function department_check(){
                var department_val = $('#department').val();

                if(department_val.length == '') {
                    $('#departmentcheck').show();
                    $('#departmentcheck').html("This field is required");
                    $('#departmentcheck').focus();
                    $('#departmentcheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#departmentcheck').hide();

                }
                if(department_val.length < 3 ) {
                    $('#departmentcheck').show();
                    $('#departmentcheck').html("Department Name length is too short");
                    $('#departmentcheck').focus();
                    $('#departmentcheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#departmentcheck').hide();

                }

                if(department_val.length > 25 ) {
                    $('#departmentcheck').show();
                    $('#departmentcheck').html("Department Name length is too large");
                    $('#departmentcheck').focus();
                    $('#departmentcheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#departmentcheck').hide();

                }
            }


            function rollno_check(){
                var rollno_val = $('#rollno').val();

                if(rollno_val.length == '') {
                    $('#rollnocheck').show();
                    $('#rollnocheck').html("This field is required");
                    $('#rollnocheck').focus();
                    $('#rollnocheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#rollnocheck').hide();

                }
                if(rollno_val.length !== 11 ) {
                    $('#rollnocheck').show();
                    $('#rollnocheck').html("Registration Number should be of the format 20XX-YY-ZZZ");
                    $('#rollnocheck').focus();
                    $('#rollnocheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#rollnocheck').hide();

                }
            }

            function email_check(){
                var email_val = $('#email').val();

                if(email_val.length == '') {
                    $('#emailnocheck').show();
                    $('#emailnocheck').html("This field is required");
                    $('#emailnocheck').focus();
                    $('#emailnocheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#emailcheck').hide();

                }
                if(!isEmail(email_val) ) {
                    $('#emailcheck').show();
                    $('#emailcheck').html("Invalid Email");
                    $('#emailcheck').focus();
                    $('#emailcheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#emailcheck').hide();

                }
            }

            function password_check(){
                var password_val = $('#password').val();

                if(password_val.length == '') {
                    $('#passwordcheck').show();
                    $('#passwordcheck').html("This field is required");
                    $('#passwordcheck').focus();
                    $('#passwordcheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#passwordcheck').hide();

                }
                if(password_val.length < 8) {
                    $('#passwordcheck').show();
                    $('#passwordcheck').html("Password must have at least 8 characters");
                    $('#passwordcheck').focus();
                    $('#passwordcheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#passwordcheck').hide();

                }
                if(password_val.length >24 ) {
                    $('#passwordcheck').show();
                    $('#passwordcheck').html("Password must be less than 24 characters");
                    $('#passwordcheck').focus();
                    $('#passwordcheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#passwordcheck').hide();

                }
            }

            function ConfirmPassword_check(){
                var ConfirmPassword_val = $('#ConfirmPassword').val();
                var password_val = $('#password').val();
                if(ConfirmPassword_val !== password_val) {
                    $('#ConfirmPasswordcheck').show();
                    $('#ConfirmPasswordcheck').html("Confirm password does not match Password");
                    $('#ConfirmPasswordcheck').focus();
                    $('#ConfirmPasswordcheck').css("color", "red");
                    err = true;
                    return false;
                }else{
                    $('#ConfirmPasswordcheck').hide();

                }

            }

            function isEmail(email) {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return regex.test(email);
            }

            $('#submitbtn').click(function(){
                 err = false;
                 firstname_check();
                 lastname_check();
                 rollno_check();
                 email_check();
                 department_check();
                 password_check();
                 ConfirmPassword_check();

                 if(err){
                     return false;
                 }
                 else{
                     $('#emailcheck').show();
                     return true;
                 }
            })
        });
    </script>

