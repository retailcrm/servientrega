<?php

namespace App\Servientrega\Type;

class ArrayOfLong
{
    /**
     * @var int
     */
    private $long;

    /**
     * @return int
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param int $long
     *
     * @return ArrayOfLong
     */
    public function withLong($long)
    {
        $new       = clone $this;
        $new->long = $long;

        return $new;
    }
}
