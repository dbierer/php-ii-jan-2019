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
	'arrayMethod'    => [new Temp(), 'doSomething'],
	'functionMethod' => function ($params) { return 'Anon Function'; },
	'classMethod' 	 => new class([]) {
		public function __construct($params) {}
		public function __invoke() { return 'Anon Class'; }
	},
];
	
$ex = new UsesPlugins($plugins);
echo $ex->arrayMethod(); 
echo PHP_EOL;
echo $ex->functionMethod(); 
echo PHP_EOL;
echo $ex->classMethod();
echo PHP_EOL;
echo $ex->doesntExist();
echo PHP_EOL;

