<?php

namespace Modules\Admin\Main\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function index()
    {
        return view('Main::Views/index');
    }

}
