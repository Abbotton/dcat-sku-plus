<?php

namespace Dcat\Admin\Extension\DcatSkuPlus\Http\Repositories;

use Dcat\Admin\Extension\DcatSkuPlus\Models\SkuAttribute as SkuAttributeModel;
use Dcat\Admin\Repositories\EloquentRepository;

class SkuAttribute extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = SkuAttributeModel::class;
}
