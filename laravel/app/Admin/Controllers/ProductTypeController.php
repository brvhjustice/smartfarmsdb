<?php

namespace App\Admin\Controllers;

use App\Models\ProductType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;

class ProductTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product Type';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    // protected function grid()
    // {
    //     $grid = new Grid(new ProductType());

    //     $grid->column('title', __('Name'));
    //     $grid->column('id', __('ID'));   
    //     $grid->column('O', __('Name'));    



    //     return $grid;
    // }

    public function index(Content $content){
        $tree = new Tree(new ProductType);
        return $content->header('Product Category')->body($tree);
    }
    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ProductType::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ProductType());

        $form->select('parent_id')->options((new ProductType())::selectOptions());
      $form->text('title', __('Title'));
        // $form->textarea('description', __('Description'));
        $form->number('order', __('Order'))->default(1);


        return $form;
    }
}
