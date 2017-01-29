<?php
class Foo
{
    private $name = 'Mike';

    /**
     * @param string $name
     */
    public function Foo(string $name)
    {
        $this->name = $name;
    }

    public static function staticMethod()
    {
        echo $this->name, PHP_EOL;
    }

    public function hoge($name, $name)
    {
    }

    public function method(int $i, string $b)
    {
        if (true) {
            return;
        }

        split($b, '');
    }
}

class Bar extends Foo
{
    /**
     * @param int $name
     */
    public function __construct($name)
    {
        parent::Foo($name);
    }

    public function method()
    {
    }
}

class Int
{

}

(new Foo([]))->staticMethod();
(new Bar([]))->staticMethod();

echo preg_replace('/(string)/e', 'strtoupper("\0")', 'teststringtest');
