<?php

namespace Bytic\Assert\Assertions\Behaviors;

trait HasException
{
    public bool $shouldWrapException = false;

    public $exception = null;

    public function orThrow($exception): self
    {
        $this->exception = $exception;
        $this->shouldWrapException = true;
        return $this;
    }

    public function hasException(): bool
    {
        return $this->shouldWrapException === true;
    }

}