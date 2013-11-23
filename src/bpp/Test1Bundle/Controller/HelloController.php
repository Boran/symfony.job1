<?php

namespace bpp\Test1Bundle\Controller;

use Symfony\Component\HttpFoundation\Response;

#use Symfony\Component\HttpFoundation\Request;

class HelloController
{
    public function indexAction($name)
    //public function indexAction($name, $name2, $var1)
    {
        return new Response('<html><body>BPP indexAction Hello '.$name .' ' .$name2 .'!</body></html>');
    }
    //public function helloAction($name, $name2, $var1='pink')
    public function helloAction($name, $name2, $var1='pink', $debug1=0)
    //public function helloAction(Request $request, $name, $name2, $var1='pink', $debug1=0)
    {
        return new Response('<html><body>BPP helloAction Hello '.$name .' ' .$name2 .'!</body></html>');
    }
}
