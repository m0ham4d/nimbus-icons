<?php

namespace Nimbus\Icons\Components;

use Illuminate\View\Component;

class Icons extends Component
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return view("icons::components.icons.{$this->name}");

    }
}
