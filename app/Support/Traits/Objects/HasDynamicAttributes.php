<?php

declare(strict_types=1);

namespace App\Support\Traits\Objects;

trait HasDynamicAttributes
{
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value): void
    {
        $this->{$name} = $value;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->{$name};
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->{$name});
    }
}
