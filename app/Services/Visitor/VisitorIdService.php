<?php

declare(strict_types=1);

namespace App\Services\Visitor;

abstract class VisitorIdService
{
    /**
     * Get id
     *
     * @return string
     */
    abstract public function id(): string;

    /**
     * Get in storage key
     *
     * @return string
     */
    abstract public function key(): string;

    /**
     * Set id
     *
     * @param string $id
     * @return self
     */
    abstract protected function setId(string $id): self;

    /**
     * Set id
     *
     * @return string
     */
    abstract protected function getId(): string;

    /**
     * Has id
     *
     * @return bool
     */
    abstract protected function hasId(): bool;
}
