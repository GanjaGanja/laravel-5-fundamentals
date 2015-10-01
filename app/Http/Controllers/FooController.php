<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FooRepository;

class FooController extends Controller
{
	//////////////////////////////////////////////
	// Option 1: inject through the constructor //
	//////////////////////////////////////////////
/* 
	private $repository;

	public function __construct(FooRepository $repository)
	{
		$this->repository = $repository;
	}

    public function foo()
    {
    	return $this->repository->get();
    }
*/

    ////////////////////////////////
    // Option 2: method injection //
    ////////////////////////////////
    public function foo(FooRepository $repository)
    {
    	return $repository->get();
    }

}
