<?php

namespace App\Entities;

use App\Database\MySQLDatabase;
use App\Entities\Core\EntityCore;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

final class Hotel extends EntityCore
{
    public string $title;
    public string $address;
    public string $rating;

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

    public static function log() : void
    {
        $log = new Logger('name');
    }





}