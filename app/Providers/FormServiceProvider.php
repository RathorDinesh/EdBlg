<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void                                             optional parameter for label name
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'opt' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsTextArea', 'components.form.textarea', ['name', 'opt' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsEmail', 'components.form.email', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsPassword', 'components.form.password', ['name', 'attributes' => []]);
        Form::component('bsDrop', 'components.form.dropdown', ['name', 'opt' => null, 'value' => null, 'data' =>null, 'default' =>null, 'attributes' => []]);
        Form::component('bsFile', 'components.form.file', ['name', 'opt' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsSubmit', 'components.form.submit', ['value' => 'Submit', 'attributes' => []]);
        Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attributes' => []]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
