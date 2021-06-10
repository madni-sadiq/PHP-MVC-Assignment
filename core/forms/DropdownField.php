<?php


namespace app\core\forms;


use app\core\Model;

class DropdownField extends BaseField
{
    public array $options;
    public function __construct(Model $model,string $attribute, array $options)
    {
        $this->model = $model;
        $this->attribute= $attribute;
        $this->options = $options;
    }
    public function renderInput(): string
    {
        return sprintf('<select name="%s" class="form-control%s" id="%s" >%s</select><br>',
            $this->attribute,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->generateOptions()

        );
    }
    public function generateOptions(){
        $str = '';
        foreach ($this->options as $option){
            $str = $str.'<option value='.$option.'>'.$option.'</option>';
        }
        return $str;
    }

}