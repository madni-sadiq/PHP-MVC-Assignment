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



<button type="submit" class="btn btn-primary">Add Subject</button>
<?php echo \app\core\forms\Forms::end()?>
