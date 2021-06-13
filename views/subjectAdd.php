<?php
/** @var $model \app\models\StudentModel */
/** @var $this \app\core\View */
$this->title = 'Add Subject';
?>
<h1>Add Subject details</h1>
<?php $form = \app\core\forms\Forms::begin('', 'post' )?>
<?php echo $form->field($model, 'Sname')?>
<?php echo $form->field($model, 'Stime')->typetime()?>
<?php echo $form->field($model, 'Etime')->typetime()?>



<button type="submit" id="Addbtn" class="btn btn-primary">Add Subject</button>
<?php echo \app\core\forms\Forms::end()?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#Snamecheck').hide();
        $('#Stimecheck').hide();
        $('#Etimecheck').hide();


        var err = false;


        $('#Sname').keyup(function(){
            Sname_check();
        });
        $('#Stime').keyup(function(){
            Stime_check();
        });
        $('#Etime').keyup(function(){
            Etime_check();
            Stime_check();
        });


        function Sname_check(){
            var Sname_val = $('#Sname').val();
            // alert(firstname_val);
            if(Sname_val.length == '') {
                $('#Snamecheck').show();
                $('#Snamecheck').html("This field is required");
                $('#Snamecheck').focus();
                $('#Snamecheck').css("color", "red");
                err = true;
                return false;
            }else{
                $('#Snamecheck').hide();

            }
            if(Sname_val.length < 3 ) {
                $('#Snamecheck').show();
                $('#Snamecheck').html("Subject Name length is too short");
                $('#Snamecheck').focus();
                $('#Snamecheck').css("color", "red");
                err = true;
                return false;
            }else{
                $('#Snamecheck').hide();

            }

            if(Sname_val.length > 25 ) {
                $('#Snamecheck').show();
                $('#Snamecheck').html("Subject Name length is too large");
                $('#Snamecheck').focus();
                $('#Snamecheck').css("color", "red");
                err = true;
                return false;
            }else{
                $('#Snamecheck').hide();

            }
            console.log(err);
        }
        function Stime_check(){
            var Stime_val = $('#Stime').val();
            console.log(Stime_val);
            if(Stime_val.length == '') {
                $('#Stimecheck').show();
                $('#Stimecheck').html("This field is required");
                $('#Stimecheck').focus();
                $('#Stimecheck').css("color", "red");
                err = true;
                return false;
            }else{
                $('#Stimecheck').hide();

            }
            console.log(err);
        }

        function Etime_check(){
            var Etime_val = $('#Etime').val();
            var Stime_val = $('#Stime').val();
            console.log(Etime_val);
            if(Etime_val.length == '') {
                $('#Etimecheck').show();
                $('#Etimecheck').html("This field is required");
                $('#Etimecheck').focus();
                $('#Etimecheck').css("color", "red");
                err = true;
                return false;
            }else{
                $('#Etimecheck').hide();

            }
            if(Etime_val < Stime_val  ) {
                $('#Etimecheck').show();
                $('#Etimecheck').html("End time must be ahead of Start time");
                $('#Etimecheck').focus();
                $('#Etimecheck').css("color", "red");
                err = true;
                return false;
            }else{
                $('#Etimecheck').hide();

            }
            console.log(err);
        }

        $('#Addbtn').click(function(){
            err = false;
            Sname_check();
            Stime_check();
            Etime_check();


            return !err;
        })
    });
</script>
