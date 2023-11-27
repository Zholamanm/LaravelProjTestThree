<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __invoke()
    {
        $persons = [
            [
                'id' => 1,
                'name' => 'adlashd',
                'age' => '20'
            ],
            [
                'id' => 2,
                'name' => 'l;gnerkg',
                'age' => '35'
            ],
            [
                'id' => 3,
                'name' => 'nsdmf,',
                'age' => '17'
            ],
            [
                'id' => 4,
                'name' => 'odpfbo',
                'age' => '24'
            ],
        ];
        return $persons;
    }
}
