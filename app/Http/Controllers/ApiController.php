<?php

namespace UHack\Pronto\Http\Controllers;

use EllipseSynergie\ApiResponse\Laravel\Response;
use League\Fractal\Manager;

class ApiController extends Controller
{
    protected $response;

    public function __construct(Response $response)
    {
        $fractal = new Manager();

        if (isset($_GET['include'])) {
            $fractal->parseIncludes($_GET['include']);
        }

        $this->response = new Response($fractal);
    }
}
