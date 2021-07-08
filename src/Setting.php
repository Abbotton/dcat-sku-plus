<?php

namespace Dcat\Admin\Extension\DcatSkuPlus;

use Dcat\Admin\Extend\Setting as Form;

class Setting extends Form
{
    public function title()
    {
        return 'SKU扩展增强版配置';
    }

    public function form()
    {
        $this->text('sku_plus_img_upload_url', '图片上传地址')
            ->default('/admin/sku-image-upload')
            ->help('必须以【/】开头')
            ->required();

        $this->text('sku_plus_img_remove_url', '图片删除地址')
            ->default('/admin/sku-image-remove')
            ->help('必须以【/】开头')
            ->required();
    }
}
