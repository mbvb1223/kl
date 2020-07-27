<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Account extends Model
{
    public function getTable()
    {
        return Session::get('tenant.id').'_account';
    }
}
