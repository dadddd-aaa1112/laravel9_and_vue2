<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __invoke() {
        $person = [
          [
              'id' => 1,
              'name' => 'Kot'
          ],
            [
                'id' => 2,
                'name' => 'Koshatina'
            ]
        ];
        return $person;
    }
}
