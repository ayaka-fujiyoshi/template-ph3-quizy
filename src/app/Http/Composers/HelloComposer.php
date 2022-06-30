<?php

// 第三章
namespace App\Http\Providers;

use Illuminate\View\View;

class HelloServiceProvider
{
    public function compose(View $view)
    {
       $view->with('view_message', 'this view is "' . $view->getName() . '"!!');
    }
}
