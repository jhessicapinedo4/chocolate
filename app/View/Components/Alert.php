<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
  public $type;

  /**
   * Create a new component instance.
   *
   * @param string $type
   * @return void
   */
  public function __construct($type)
  {
    $this->type = $type;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.alert');
  }
}
