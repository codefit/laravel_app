<?php

namespace App\Helpers;

use App\Exceptions\CompileCSSException;
use App\Exceptions\MinifyCSSException;
use App\Exceptions\MinifyJSException;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Less_Parser as Less;
use MatthiasMullie\Minify\CSS;
use MatthiasMullie\Minify\JS;

use Illuminate\Support\Facades\Cookie;

class Compile
{
    public function __construct(
        private Less $LESS,
        private CSS $CSS,
        private JS $JS
    )
    {
        $this->compile();
    }

    private function compile() : void {

        // BOF Less -> CSS -> Compile

        if($this->shouldCompile('less')){
            $this->css();
        }
        // EOF Less -> CSS -> Compile

        // BOF Minify JS
        /*
        if($this->shouldCompile('js')){
            //$this->js();
        }
        */
        // EOF Minify JS

    }

    private function css() : void {
        try {
            $this->LESS->parseFile(
                resource_path(). '/less/style.less');
            if(!file_put_contents(
                resource_path(). '/css/style.css',
                $this->LESS->getCss()
            )){
                throw new CompileCSSException('Chyba kompilace LESS');
            }
            if(!file_put_contents(
                public_path(). '/css/style.min.css',
                $this->CSS
                    ->add(resource_path(). '/css/style.css')
                    ->minify()
            )){
                throw new MinifyCSSException('Chyba minifakce CSS ');
            }

        } catch (CompileCSSException $compileCSSException) {
            die($compileCSSException->getMessage());
        } catch (MinifyCSSException $minifyCSSException){
            die($minifyCSSException->getMessage());
        } catch (\Exception $exception){
            die($exception->getMessage());
        }
    }
    private function js() : void {
        try {
            if(!file_put_contents(
                $_SERVER['DOCUMENT_ROOT'] . '/assets/js/app.min.js',
                $this->JS
                    ->add($_SERVER['DOCUMENT_ROOT'] . '/assets/js/app.js')
                    ->minify()
            )){
                throw new MinifyJSException('Chyba minifkace JS');
            }
        } catch(MinifyJSException $exception){
            die($exception->getMessage());
        }
    }

    public static function run() : static {
        return new static(
            new Less(),
            new CSS(),
            new JS()
        );
    }

    public function shouldCompile(string $extension = '') : bool {
        $dir = resource_path() . '/' . $extension;
        $compile = false;

        $compile_time = File::get(public_path('compile.txt'));
        foreach ( Functions::getDirFiles($dir) as $file){
            if(pathinfo($file,PATHINFO_EXTENSION) === $extension){
                if(filemtime($file) > $compile_time){
                    $compile = true;
                }
            }
        }

        File::put(public_path('compile.txt'),time());
        return $compile;
    }
}
