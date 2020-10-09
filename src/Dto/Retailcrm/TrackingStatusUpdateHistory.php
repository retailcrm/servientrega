<?php

namespace App\Dto\Retailcrm;

use DateTimeImmutable;

class TrackingStatusUpdateHistory
{
    /**
     * @var string
     */
    public $code;

    /**
     * @var DateTimeImmutable
     */
    public $updatedAt;

    /**
     * @var string|null
     */
    public $comment;
}
