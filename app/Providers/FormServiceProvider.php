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
        view()->share('form', $this);
    }

    /**
     * @param array $args
     */
    public function setViewVars($args = [])
    {
        $this->vData = $args;
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function submitButton($data = [])
    {
        $data = array_merge($data, $this->vData);
        return view('components.submit-button', compact('data'));
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function tableActions($data)
    {
        $data = array_merge($data, $this->vData);
        return view('components.form.table-actions', compact('data'));
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function input($data = [])
    {
        $data = array_merge($data, $this->vData);
        return view('components.form.input', compact('data'));
    }

    public function amount($data = [])
    {
        $data = array_merge($data, $this->vData);
        return view('components.form.amount', compact('data'));
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function select($data = [])
    {
        $data = array_merge($data, $this->vData);
        return view('components.form.select', compact('data'));
    }
}
