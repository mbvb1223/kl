<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        dd($managers);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }


    public function show(Manager $manager)
    {
        //
    }

    public function edit(Manager $manager)
    {
        //
    }

    public function update(Request $request, Manager $manager)
    {
        //
    }

    public function destroy(Manager $manager)
    {
        //
    }
}
