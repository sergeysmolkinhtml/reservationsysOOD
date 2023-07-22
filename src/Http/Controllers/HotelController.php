<?php

namespace App\Http\Controllers;

use League\Plates\Engine;

final readonly class HotelController
{

    public function __construct(
        private Engine $templateEngine
    ) {}

    public function index() : void
    {
        echo $this->templateEngine->render('hotels/index');
    }
}