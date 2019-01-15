<?php
/**
 * @todo: get this working right!
 */
class UsesPlugins
{
    protected $plugins;
    public function __construct(array $plugins)
    {
		$this->plugins = $plugins;
	}
    public function __call($name, $params)
    {
		if (isset($this->plugins[$name])) {
			if (is_callable($this->plugins[$name])) {
				return $this->plugins[$name]($params);
			} else {
				return NULL;
			} 
		} else {
			return NULL;
		}
    }
}

class Temp
{
	public function doSomething()
	{
		return 'Array Reference';
	}
}

$plugins = [
	'method1' => [new Temp(), 'doSomething'],
	'method2' => function ($params) { return 'Anon Function'; },
	'method3' => new class([]) {
		public function __construct($params) {}
		public function __invoke() { return 'Anon Class'; }
	},
];
	
$ex = new UsesPlugins($plugins);
echo '#1: Array Callable:     ' . $ex->method1(); 
echo PHP_EOL;
echo '#2: Anonymous Function: ' . $ex->method2(); 
echo PHP_EOL;
echo '#3: Anonymous Class:    ' . $ex->method3();
echo PHP_EOL;
echo $ex->doesntExist();
echo PHP_EOL;

