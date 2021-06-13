<?php


namespace app\core\forms;


use app\models\StudentEnrolls;

class CardField
{
    public int $sid;
    public string $firstname = '';
    public string $lastname = '';
    public string $Stime = '';
    public string $Etime = '';
    public string $Sname = '';

    public function __construct(int $sid, string $Sname, string $firstname, string $lastname,string $Stime,string $Etime)
    {
        $this->sid = $sid;
        $this->Sname = $Sname;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->Stime = $Stime;
        $this->Etime = $Etime;

    }

    public function __toString()
    {
        $record = StudentEnrolls::findOne(['email' => $_SESSION['email'], 'Subject_id' => $this->sid]);
        if ($record) {
            return sprintf('<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">%s</h5>
        <h6 class="card-title">Instructor: %s %s</h6>
        <p class="card-text">Start Time: %s<br>End Time: %s</p>
        <button class="btn btn-primary" style="pointer-events: none;" type="button" disabled>Enrolled</button>
    </div>
</div>', $this->Sname, $this->firstname, $this->lastname, $this->Stime, $this->Etime);

        } else {
            return sprintf('<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">%s</h5>
        <h6 class="card-title">Instructor: %s %s</h6>
        <p class="card-text">Start Time: %s<br>End Time: %s</p>
        <form action="/Enroll" method="post">
        <input type = "text" name = "sid" value = "%s">
        <input  type = "submit" value = "Enroll" class = "btn btn-block btn-primary">
        </form>
    </div>
</div>', $this->Sname, $this->firstname, $this->lastname, $this->Stime, $this->Etime, $this->sid);
        }
    }

}