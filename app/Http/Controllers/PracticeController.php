<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function practice2()
    {
        dump(['a' => '123', 'b' => '456']);
    }

    public function practice1()
    {
        echo 'This is my first practice route.';
    }

    public function index($n = null)
    {
        $methods = [];
        # If no specific practice is specified, show index of all available methods
        if (is_null($n)) {
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    $methods[] = $method;
                }
            }
            return view('practice')->with(['methods' => $methods]);
        } # Otherwise, load the requested method
        else {
            $method = 'practice' . $n;
            return (method_exists($this, $method)) ? $this->$method() : abort(404);
        }
    }
}
