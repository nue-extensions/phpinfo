<?php

namespace Nue\PHPInfo\Providers;

use Illuminate\Support\ServiceProvider;
use Novay\Nue\Nue;
use Nue\PHPInfo\PHPInfo;

class PHPInfoServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(PHPInfo $extension)
    {
        if (! PHPInfo::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'nue-phpinfo');
        }

        $this->app->booted(function () {
            PHPInfo::routes(__DIR__.'/../../routes/web.php');
        });

        Nue::extend('phpinfo', __CLASS__);
    }
}