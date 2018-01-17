<?php
namespace RobinTheHood\Html;

use RobinTheHood\Html\HtmlTag;

class HtmlInput extends HtmlTag
{
    protected $values = [];

    public function __construct($tagName, array $attributes)
    {
        $this->tagName = $tagName;
        $this->attributes = $attributes;
    }

    public function setValues($values)
    {
        $this->values = $values;
    }

    public function render()
    {
        if ($this->tagName === 'textArea') {
            return $this->renderTextArea();
        } elseif ($this->tagName === 'input') {
            return $this->renderInput();
        } elseif ($this->tagName === 'select') {
            return $this->renderSelect();
        }
        return '';
    }

    public function renderInput()
    {
        return '<input ' . $this->renderAttributes() . '>';
    }

    public function renderTextArea()
    {
        return '<textarea ' . $this->renderAttributes() . '></textarea>';
    }

    public function renderSelect()
    {
        $selectedValue = $this->attributes['value'];
        unset($this->attributes['value']);

        $options = '';
        foreach($this->values as $value => $name) {
            $selected = '';
            if ($selectedValue == $value) {
                $selected = 'selected';
            }
            $options .= '<option value="' . $value . '" ' . $selected . '>' . $name . '</option>';
        }
        return '<select ' . $this->renderAttributes() . '>' . $options . '</select>';
    }
}
