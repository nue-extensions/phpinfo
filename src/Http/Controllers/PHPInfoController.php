<?php

namespace Nue\PHPInfo\Http\Controllers;

use Illuminate\Routing\Controller;
use Nue\PHPInfo\PHPInfo;

class PHPInfoController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PHPInfo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() 
    {
        view()->share([
            'title' => $this->title
        ]);
    }

    /**
     * Index interface.
     *
     * @param Request $request
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $info = PHPInfo::toCollection();

        return view('nue-phpinfo::index', compact('info'));
    }
}