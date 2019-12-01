<?php

namespace Roseinory\LaravelShop\Data\Goods\Observers;

use Roseinory\LaravelShop\Data\Goods\Models\Category;

class CategoryObserver
{
     // 均是在动作发生之后执行的
    public function created(Category $category)
    {
        //
    }
    // 这是在Category创建的时候执行
    public function creating  (Category $category)
    {
        dd('creating');
    }

    // 修改前会执行的事件
    public function updating(Category $category)
    {
        // dd('updating');
    }

    public function updated(Category $category)
    {
        dd('updated');
    }

    public function deleted(Category $category)
    {
        //
    }

    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \ShineYork\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
