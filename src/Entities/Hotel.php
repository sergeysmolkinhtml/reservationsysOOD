<?php

namespace App\Entities;

use App\Entities\Core\EntityCore;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="hotels")
 */
final class Hotel extends EntityCore
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
    public string $title;
    /**
     * @ORM\OneToMany(targetEntity="Client", mappedBy="hotel")
     */
    private $clients;
    public string $address;

    public string $rating;

    public string $type;
    private array $reviews;

    public const MAX_AVAILABLE_ROOMS = 10; // config: app.max.rooms -> db event
    public static string $configStatusNameHotelNotWorking = 'Not working';
    public static string $configStatusNameHotelWorking = 'Working';

    protected const TABLE = 'hotels';

    private const PRIMARY_KEY = 'id';

    /**
     * @param int|null $id
     */
    public function __construct(?int $id = null)
    {
        parent::__construct($id);
    }


    public static function getUserTable() : string
    {
        return self::TABLE;
    }

    public function addReview(Review $review): void
    {
        $this->reviews[] = $review;
    }

    public function getReviews(): array
    {
        return $this->reviews;
    }
    /**
     * @return String
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param String $title
     */
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    /**
     * @return String
     */
    public function getAddress() : string
    {
        return $this->address;
    }

    /**
     * @param String $address
     */
    public function setAddress(string $address) : void
    {
        $this->address = $address;
    }

    /**
     * @return String
     */
    public function getRating() : string
    {
        return $this->rating;
    }

    /**
     * @param String $rating
     */
    public function setRating(string $rating) : void
    {
        $this->rating = $rating;
    }

    private function setType(string $type) : void
    {
        $this->type = $type;
    }

    public static function fromInt(int $price) : Hotel
    {
        $object = new Hotel();

        $type = match ($price) {
           100 <=> 500  => 'Type of hotel 1',
           200 <=> 1000 => 'Type of hotel 2',
           300 <=> 2000 => 'Type of hotel 3',
           default      => 'Not enough money'
        };

        $object->setType($type);

        return $object;
    }



}