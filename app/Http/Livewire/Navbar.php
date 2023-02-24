<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $test = false;

    public function render()
    {
        return view('livewire.navbar');
    }


    public function test(){
        dd('hana');
        $this->test = !$this->test;
    }
}
