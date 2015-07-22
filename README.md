Json Query
=============
[![Latest Stable Version](https://poser.pugx.org/johnitvn/cli-rumtime/v/stable)](https://packagist.org/packages/johnitvn/cli-rumtime)
[![License](https://poser.pugx.org/johnitvn/cli-rumtime/license)](https://packagist.org/packages/johnitvn/cli-rumtime)
[![Total Downloads](https://poser.pugx.org/johnitvn/cli-rumtime/downloads)](https://packagist.org/packages/johnitvn/cli-rumtime)
[![Monthly Downloads](https://poser.pugx.org/johnitvn/cli-rumtime/d/monthly)](https://packagist.org/packages/johnitvn/cli-rumtime)
[![Daily Downloads](https://poser.pugx.org/johnitvn/cli-rumtime/d/daily)](https://packagist.org/packages/johnitvn/cli-rumtime)

A PHP library .


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist johnitvn/cli-rumtime "*"
```

or add

```
"johnitvn/cli-rumtime": "*"
```

to the require section of your `composer.json` file.


Usage
-----

1. Create processor

````php
$workingdir = 'path/to/working_dir';
$process = new johnitvn\cliruntime\CliRuntimeProcess($workingdir);
````

If you set working dir is null in CliRuntimeProcess constructor current working dir will be path of file call CliRuntimeProcess

2. Run command without return and display ouput

````php
$process->run('echo Hello');
````

3. Run command with capture output

````php
$output = array();
$process->runCapture('echo Hello',$output);
var_dump($output);
````

As example reference variable $ouput will get command output lines as array 

4. Run command with display out put

````php
$process->runDisplayOutput('echo Hello');
````

`runDisplayout()` will be run command and display out

5. Command Builder
You can use `johnitvn\cliruntime\CommandBuidler` as utility for create command

Below is simple example with CommandBuilder:

````php
$command = new johnitvn\cliruntime\CommandBuidler('echo');
$command->addParam('Hello world');
echo $command->getCommand();
```` 

and the result is:

````
echo Hello world
````

You can see below code snippet for understand how to use CommandBuilder class

````php
$command = new CommandBuidler('phpunit');
$command->addFlag('v')
    ->addArgument('stop-on-failure')
    ->addArgument('configuration', 'phpunit.xml')
    ->addParam('TestCase.php');
echo $command->getCommand();
````

And the result is:

````php
phpunit TestCase.php -v --stop-on-failure --configuration=phpunit.xml
````

You can see the class comment for more detail about usage
