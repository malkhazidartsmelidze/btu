<?php

namespace App\Traits;

trait HasName
{
  public function getNameColumn()
  {
    return $this->getTable() . '.name';
  }
}
