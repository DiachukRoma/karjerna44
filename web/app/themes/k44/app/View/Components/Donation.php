<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Donation extends Component
{
    public $donations_local;
    public $donations_international;
    private $options;

    public function __construct()
    {
        $this->options = get_field('general_settings', 'option');
        $this->donations_local = $this->options['donations_local'];
        $this->donations_international = $this->options['donations_international'];
    }

    public function render(): View|Closure|string
    {
        return view('components.donation');
    }
}
