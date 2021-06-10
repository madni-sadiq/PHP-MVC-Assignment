<?php


namespace app\core\forms;


class TextField extends BaseField
{


    public function renderInput(): string
    {
        return sprintf('<textarea name="%s" class="form-control%s" >%s</textarea><br>',
            $this->attribute,
        $this->model->hasError($this->attribute) ? ' is-invalid' : '',
        $this->model->{$this->attribute}

        );
    }
}