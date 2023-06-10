<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MailComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $mode;
    public function __construct($id,$mode)
    {
        $this->id = $id;
        $this->mode = $mode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.mail-component');
    }
}
