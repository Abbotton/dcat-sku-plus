<?php

namespace Dcat\Admin\Extension\DcatSkuPlus;

use Dcat\Admin\Admin;
use Dcat\Admin\Extension\DcatSkuPlus\Models\SkuAttribute;
use Dcat\Admin\Form\Field;

class SkuField extends Field
{
    protected $view = 'dcat-sku-plus::index';

    public function render()
    {
        Admin::js('vendor/dcat-admin-extensions/abbotton/dcat-sku-plus/js/index.js');
        Admin::css('vendor/dcat-admin-extensions/abbotton/dcat-sku-plus/css/index.css');

        $uploadUrl = DcatSkuPlusServiceProvider::setting('sku_plus_img_upload_url') ?: '/admin/sku-image-upload';
        $deleteUrl = DcatSkuPlusServiceProvider::setting('sku_plus_img_remove_url') ?: '/admin/sku-image-remove';
        $skuAttributes = SkuAttribute::orderBy('sort', 'desc')->get();

        $this->script = <<< EOF
        window.DemoSku = new JadeKunSKU('{$this->getElementClassSelector()}');
EOF;
        $this->addVariables(compact('skuAttributes', 'uploadUrl', 'deleteUrl'));

        return parent::render();
    }

    /**
     * 添加扩展列.
     *
     * @param  array  $column
     * @return $this
     */
    public function addColumn(array $column = []): self
    {
        $this->addVariables(['extra_column' => json_encode($column)]);

        return $this;
    }
}
