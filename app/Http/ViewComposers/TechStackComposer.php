<?php
 
namespace App\Http\ViewComposers;
 
use Illuminate\View\View;
use App\Models\TechStackType;
 
class TechStackComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('techStackTypes', TechStackType::all());
    }
}