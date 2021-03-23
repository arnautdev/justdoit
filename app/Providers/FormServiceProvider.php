<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    private $vData = [];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (!empty($view->data)) {
                $this->vData = $view->data;
            }
        });

        view()->share('form', $this);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function submitButton($args = [])
    {
        $data = array_merge($args, $this->vData);
        return view('components.submit-button', compact('args'));
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function tableActions($args)
    {
        $data = array_merge($args, $this->vData);
        return view('components.form.table-actions', compact('args'));
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function input($args = [])
    {
        $data = array_merge($args, $this->vData);
        return view('components.form.input', compact('args'));
    }

    public function amount($args = [])
    {
        dd($args, $this->vData);
        $data = array_merge($args, $this->vData);
        dd($data);
        return view('components.form.amount', compact('args'));
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function select($args = [])
    {
        $data = array_merge($args, $this->vData);
        return view('components.form.select', compact('args'));
    }
}
