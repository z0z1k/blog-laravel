<?php

namespace App\Http\Requests\Tags;

class Update extends Store
{

    protected function makeUniqueRule()
    {
        return parent::makeUniqueRule()->ignore($this->route('id'));
    }
}
