<?php
namespace App\Providers;
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/ckeditor.js' => public_path('vendor/ckeditor/ckeditor/ckeditor.js'),
                __DIR__ . '/config.js' => public_path('vendor/ckeditor/ckeditor/config.js'),
                __DIR__ . '/styles.js' => public_path('vendor/ckeditor/ckeditor/styles.js'),
                __DIR__ . '/contents.css' => public_path('vendor/ckeditor/ckeditor/contents.css'),
                __DIR__ . '/adapters' => public_path('vendor/ckeditor/ckeditor/adapters'),
                __DIR__ . '/lang' => public_path('vendor/ckeditor/ckeditor/lang'),
                __DIR__ . '/skins' => public_path('vendor/ckeditor/ckeditor/skins'),
                __DIR__ . '/plugins' => public_path('vendor/ckeditor/ckeditor/plugins'),
            ],
            'ckeditor'
        ); 
    }
    public function register()
    {
    }
}