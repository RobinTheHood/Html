<?php

namespace RobinTheHood\Html;

class HtmlTag
{
    protected $tagName;
    protected $content;
    protected $attributes = [];

    public function setAttribute($name, $value)
    {
    }

    public function setAttributes($attributes)
    {
        foreach ($attributes as $name => $value) {
            $this->extendAttribute($name, $value);
        }
    }

    public function extendAttribute($name, $value)
    {
        if (isset($this->attributes[$name])) {
            $this->attributes[$name] .= ' ' . $value;
        } else {
            $this->attributes[$name] = trim($value);
        }
    }

    public function addClass($value)
    {
        $this->extendAttribute('class', ' ' . $value);
    }

    public function renderAttributes()
    {
        $html = '';
        foreach ($this->attributes as $name => $value) {
            $html .= $name . '="' . $value . '" ';
        }
        return $html;
    }
}
