<?php

namespace RobinTheHood\Html;

use RobinTheHood\Html\HtmlTag;

class HtmlLabel extends HtmlTag
{
    public function __construct($content, array $attributes)
    {
        $this->content = $content;
        $this->attributes = $attributes;
    }

    public function render()
    {
        return '<label ' . $this->renderAttributes() . '>' . $this->content . '</label>';
    }
}
