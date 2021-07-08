<?php

namespace Dcat\Admin\Extension\DcatSkuPlus\Http\Controllers;

use Dcat\Admin\Extension\DcatSkuPlus\Http\Repositories\SkuAttribute;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;

class SkuAttributeController extends AdminController
{
    private $attrType = [
        'checkbox' => '复选框',
        'radio' => '单选框',
    ];

    /**
     * Index interface.
     *
     * @param  Content  $content
     *
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->title('属性列表')
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new SkuAttribute(), function (Grid $grid) {
            $grid->model()->orderByDesc('id');
            $grid->id->sortable();
            $grid->column('attr_name', '属性名称');
            $grid->column('attr_type', '属性类型')
                ->using($this->attrType)
                ->label([
                    'checkbox' => 'info',
                    'radio' => 'primary'
                ]);
            $grid->column('sort', '排序')->help('排序越大越靠前');
            $grid->column('attr_value', '属性值')->explode()->label();

            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->disableViewButton();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('attr_name', '属性名称');
                $filter->equal('attr_type', '属性类型')->select($this->attrType);
            });
        });
    }

    /**
     * Edit interface.
     *
     * @param  mixed  $id
     * @param  Content  $content
     *
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->title('编辑属性')
            ->body($this->form()->edit($id));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new SkuAttribute(), function (Form $form) {
            $form->display('id');
            $form->text('attr_name', '属性名称')->required();
            $form->radio('attr_type', '属性类型')->options($this->attrType)->required();
            $form->list('attr_value', '属性值');
            $form->number('sort', '排序')->default(0)->min(0)->max(100);

            $form->display('created_at');
            $form->display('updated_at');

            $form->disableViewButton();
            $form->disableViewCheck();
        });
    }

    /**
     * Create interface.
     *
     * @param  Content  $content
     *
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->title('添加属性')
            ->body($this->form());
    }
}
