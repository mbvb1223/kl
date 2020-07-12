<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tenancy\Identification\Concerns\AllowsTenantIdentification;
use Tenancy\Identification\Contracts\Tenant;
use Tenancy\Identification\Drivers\Http\Contracts\IdentifiesByHttp;
use Tenancy\Tenant\Events\Created;
use Tenancy\Tenant\Events\Deleted;
use Tenancy\Tenant\Events\Updated;

class Building extends Model implements Tenant, IdentifiesByHttp
{
    use AllowsTenantIdentification;

    const PREFIX = 'kl';

    protected $dispatchesEvents = [
        'created' => Created::class,
        'updated' => Updated::class,
        'deleted' => Deleted::class,
    ];

    protected $fillable = [
        'status_id',
        'portal_hostname',
        'portal_path',
        'name',
    ];

    public function getTenantKeyName(): string
    {
        return 'id';
    }

    public function getTenantKey()
    {
        return self::PREFIX . '_' . $this->id;
    }

    public function getTenantIdentifier(): string
    {
        return get_class($this);
    }

    public function tenantIdentificationByHttp(Request $request): ?Tenant
    {
        return $this->query()
            ->where('portal_hostname', $request->getHttpHost())
            ->first();
    }
}
