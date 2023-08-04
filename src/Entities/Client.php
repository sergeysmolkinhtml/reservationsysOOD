<?php

namespace App\Entities;

use App\Entities\Core\EntityCore;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
final class Client extends EntityCore
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;
    /**
     * @ORM\Column(type="string")
     */
    public string $name;
    /**
     * @ORM\ManyToOne(targetEntity="Hotel", inversedBy="clients")
     * @ORM\JoinColumn(name="hotel_id", nullable=false, referencedColumnName="id")
     */
    public $hotel;
}