<?php

declare(strict_types=1);

namespace App\Services\Visitor;

use Illuminate\Support\Facades\Cookie;

final class CookieVisitorIdService extends VisitorIdService
{
    /** @var string */
    private string $id;

    public function __construct()
    {
        $this->id = uniqid();
    }

    /**
     * @inheritDoc
     */
    public function id(): string
    {
        if ($this->hasId()) {
            return $this->getId();
        } else {
            $this->setId($this->id);
            return $this->id;
        }
    }

    /**
     * @inheritDoc
     */
    public function key(): string
    {
        return 'visitor_id';
    }

    /**
     * @inheritDoc
     */
    protected function setId(string $id): self
    {
        Cookie::queue($this->key(), $id, (60 * 24 * 365));
        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function getId(): string
    {
        $id = Cookie::get($this->key());
        $visitor_id = is_string($id) ? $id : $this->id;
        return $visitor_id;
    }

    /**
     * @inheritDoc
     */
    protected function hasId(): bool
    {
        return Cookie::has($this->key());
    }
}
