<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetLocale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setlocale:lang {lang}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change local language.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //ruta al archivo app.php
        $file = config_path().'\app.php';
 
        //lenguaje actual
        $current_lang = config('app.locale');
 
        //lenguaje recibido como argumento
        $new_lang = $this->argument('lang');
 
        //busca la cadena de texto que contiene el lenguaje actual
        $search = "'locale' => '".$current_lang."'";
 
        //crea una nueva cadena de texto con el lenguaje deseado
        $replace = "'locale' => '".$new_lang."'";
 
        //remplazamos el nuevo lenguaje por el anterior en app.php
        $contents = str_replace($search, $replace, file_get_contents($file));
 
        //escribimos el contenido del archivo nuevamente
        file_put_contents($file, $contents);
 
        //retorna el mensaje a la consola 
        $this->info('locale language has changed to => '.$new_lang);
    }
}
