<?php

namespace Dcat\Admin\Extension\DcatSkuPlus\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

class SkuAttribute extends Model
{
    use HasDateTimeFormatter;

    public $table = 'sku_attribute';

    protected $casts = [
        'attr_value' => 'json'
    ];
}
