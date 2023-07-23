<?php

namespace App\Entities;

use App\Entities\Core\EntityCore;

final class User extends EntityCore
{

    private const PRIMARY_KEY = 'id';

    public function __construct(
        private String $name,
        private String $email,
        private String $password
    ) {
        parent::__construct();
    }

    /**
     * @return String
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    /**
     * @return String
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    /**
     * @return String
     */
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }


    public function __toString() : string
    {
        return self::class;
    }




}