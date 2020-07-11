<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

class Manager extends Model
{
    use OnTenant;

    protected $fillable = ["name"];
}
