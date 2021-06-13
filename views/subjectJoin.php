<?php
use app\core\forms\CardField;
use app\core\View;
use app\models\SubjectModel;

/** @var $subject SubjectModel */
/** @var $this View */

$this->title = 'Join Subjects';
?>
<?php
   // $subjects = SubjectModel::findOne([''])
foreach ($subject as $key => $record){
    $card  = new CardField($subject[$key]['id'], $subject[$key]['Sname'], $subject[$key]['firstname'], $subject[$key]['lastname'], $subject[$key]['Stime'], $subject[$key]['Etime']);
    echo $card;
}?>

