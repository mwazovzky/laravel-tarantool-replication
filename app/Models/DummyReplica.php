<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DummyReplica extends Model
{
    protected $connection = 'tarantool';

    protected $table = 'DUMMIES';
}
