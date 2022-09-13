<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('ProductType.title', 'Category');
        $grid->column('price', __('Price'));
        $grid->column('stars', __('Stars'));
        $grid->column('img', __('Thumbnail Photo'))->image('',60,60);
        $grid->column('description', __('Description'))->style('max-width:200px;word-break:break-all;')->display(function ($val){
            return substr($val,0,30);
        });
        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('title', __('Title'));
            $filter->like('ProductType.title', __('Category'));
        });
        // $grid->column('created_at', __('Created_at'));
        // $grid->column('updated_at', __('Updated_at'));


        return $grid;
    }

    /**
     * Make a show builder.
     * 
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->text('title', __('Title'));
        $form->select('type_id')->options((new ProductType())::selectOptions());
        $form->number('price', __('Price'));
        $form->text('location', __('Location'));
        $form->number('stars', __('Stars'));
        $form->number('order', __('Order'));
        $form->image('img', __('Thumbnail'))->uniqueName();
        $form->textarea('description', __('Description'));


        return $form;
    }
}
