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
     * @param array $data
     * @param string $class
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function button($title = '', $icon = 'fa fa-save', $class = 'btn-sm btn-primary', $args = [])
    {
        $data['title'] = $title;
        $data['icon'] = $icon;
        $data['btnClass'] = $class;
        $data = array_merge($data, $this->vData);
        return view('components.form.button', compact('data'));
    }

    /**
     * @param string $title
     * @param null $route
     * @param string $icon
     * @param string $class
     * @param array $args
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function href($title = '', $route = null, $icon = 'fa fa-save', $class = 'btn-sm btn-primary', $args = [])
    {
        $data['title'] = $title;
        $data['icon'] = $icon;
        $data['btnClass'] = $class;
        $data['route'] = $route;
        $data = array_merge($data, $this->vData);
        return view('components.form.button', compact('data'));
    }

    /**
     * @param array $args
     */
    public function setData($args = [])
    {
        $this->vData = $args;
    }

    public function daterangepicker($data = [])
    {
        $data = array_merge($data, $this->vData);
        return view('components.form.daterangepicker', compact('data'));
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function datepicker($data = [])
    {
        $data = array_merge($data, $this->vData);
        return view('components.form.datepicker', compact('data'));
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
