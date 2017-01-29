# php7-breaking-bc-sample

## php -l

```
$ find ./src -name '*.php' | xargs php -l
PHP Fatal error:  Redefinition of parameter $name in ./src/Foo.php on line 19

Fatal error: Redefinition of parameter $name in ./src/Foo.php on line 19

Errors parsing ./src/Foo.php
```

## php7cc

```
$ composer install
$ ./vendor/bin/php7cc src

File: /Users/shin/sandbox/phan-with-php5/src/Foo.php
> Line 9: PHP 4 constructors are now deprecated
    public function Foo(\string $name)
    {
    }
> Line 19: Duplicate function parameter name "name"
    public function hoge($name, $name)
    {
    }
> Line 29: Removed function "split" called
    split($b, '');
> Line 48: Reserved name "int" used as a class, interface or trait name
    class Int
    {
    }
> Line 56: Removed regular expression modifier "e" used
    preg_replace('/(string)/e', 'strtoupper("\\0")', 'teststringtest');

Checked 1 file in 0.016 second
```

## Phan

```
$ docker run -v `pwd`:/mnt/src --rm cloudflare/phan:0.7 -b -l src                                                                                          ⏎
src/Foo.php:16 PhanUndeclaredVariable Variable $this is undeclared
src/Foo.php:19 PhanParamRedefined Redefinition of parameter $name
src/Foo.php:40 PhanTypeMismatchArgument Argument 1 (name) is int but \Foo::Foo() takes string defined at src/Foo.php:9
src/Foo.php:43 PhanParamSignatureMismatch Declaration of function method() should be compatible with function method(int $i, string $b) defined in src/Foo.php:23
src/Foo.php:53 PhanTypeMismatchArgument Argument 1 (name) is array but \Foo::__construct() takes string defined at src/Foo.php:53
src/Foo.php:54 PhanTypeMismatchArgument Argument 1 (name) is array but \Bar::__construct() takes int defined at src/Foo.php:38
```
