<?php

namespace LaravelEnso\Enums\Services;

use Illuminate\Support\Collection;

class Enums
{
    private $enums;

    public function __construct()
    {
        $this->enums = new Collection();
    }

    public function register($enums)
    {
        (new Collection($enums))->each(fn ($enum, $key) => $this->enums->put(
            $key,
            is_array($enum) ? $enum : $enum::all()
        ));
    }

    public function remove($aliases)
    {
        (new Collection($aliases))->each(fn ($alias) => $this->enums->forget($alias));
    }

    public function all()
    {
        return $this->enums;
    }
}
