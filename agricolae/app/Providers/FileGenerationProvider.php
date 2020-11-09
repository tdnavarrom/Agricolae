<?php

namespace App\Providers;

use App\Util\CreatePdf;
use App\Util\CreateExcel;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\FileGeneration;

class FileGenerationProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FileGeneration::class, function ($app, $parameters){

            $choice = $parameters["choice"];
            if ($choice == "pdf")
            {
                return new CreatePdf($parameters);
            }
            else
            {
                return new CreateExcel($parameters);
            }
        });
    }
}

?>