<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BoardCard extends Component
{
    public $title;
    public $company;

    public function __construct($title,  $company)
    {
        $this->title = $title;
        $this->company = $company;
    }

    public function render()
    {
        return view('components.board-card');
    }
}
