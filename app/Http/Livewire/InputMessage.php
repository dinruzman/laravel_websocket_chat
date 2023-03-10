<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InputMessage extends Component
{
    public $yourmessage;
    public $yourname;

    public function submit()
    {
        $name = $this->yourname;
        $array = [
            'name' => $name,
            'message' => $this->yourmessage,
        ];

        $this->yourmessage = '';

        event (new \App\Events\NewTrade($array));
    }

    public function render()
    {
        return view('livewire.input-message');
    }
}
