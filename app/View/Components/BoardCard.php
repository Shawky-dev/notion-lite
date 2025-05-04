<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BoardCard extends Component
{
    public $title;
    public $company;
    public $id;

    public function __construct($title,  $company, $id)
    {
        $this->title = $title;
        $this->company = $company;
        $this->id = $id;
    }

    public function render()
    {
        return view('components.board-card');
    }
}
