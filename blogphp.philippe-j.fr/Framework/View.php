<?php

namespace App\Framework;


class View
{
    private $file;
    private $title;
    private $request;
    private $session;


    /**
     * @return void
     */
    public function __construct()
    {
        $this->request = new Request;
        $this->getMethod= $this->request->getGet();
        $this->session = $this->request->getSession();
    }

    /**
     * @param mixed $template
     * @param array $data
     * 
     * @return void
     */
    public function render($template, $data = [])
    {
        $this->file =  \TEMPLATES_PATH.$template.'.php'; 
        $content  = $this->renderFile($this->file, $data);
        $view = $this->renderFile( \LAYOUT_PATH, [
            'title' => $this->title,
            'content' => $content,
            'session' => $this->session
        ]);
        print_r($view) ;
    }

    /**
     * @param mixed $file
     * @param mixed $data
     * 
     * @return void
     */
    private function renderFile($file, $data)
    {
        
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header('Location: index.php?route=notFound');
    }
}