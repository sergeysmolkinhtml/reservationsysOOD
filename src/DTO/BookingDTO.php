<?php

namespace App\DTO;

class BookingDTO
{


    public static function getArray(array $data) : array
    {
        $self = [];

        if(array_key_exists('somekey1',$data)) {
            $self['somekey1'] = $data['somekey1'];
        }

        return $self;
    }
}