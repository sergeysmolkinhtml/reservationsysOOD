<?php

namespace App\Entities;

final readonly class Review
{
    private string $comment;
    private float $rating;

    public function __construct(string $comment, float $rating)
    {
        $this->comment = $comment;
        $this->rating = $rating;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getRating(): float
    {
        return $this->rating;
    }
}