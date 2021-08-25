<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Start extends BaseCommand
{
	/**
	 * The Command's Group
	 *
	 * @var string
	 */
	protected $group = 'App';

	/**
	 * The Command's Name
	 *
	 * @var string
	 */
	protected $name = 'start';

	/**
	 * The Command's Description
	 *
	 * @var string
	 */
	protected $description = 'Start Server on port 8091';

	/**
	 * The Command's Usage
	 *
	 * @var string
	 */
	protected $usage = 'php spark start';

	/**
	 * The Command's Arguments
	 *
	 * @var array
	 */
	protected $arguments = [];

	/**
	 * The Command's Options
	 *
	 * @var array
	 */
	protected $options = [];

	/**
	 * Actually execute a command.
	 *
	 * @param array $params
	 */
	public function run(array $params)
	{
		$_SERVER['argv'][2] = '--port';
		$_SERVER['argv'][3] = '8091';
		$_SERVER['argc']    = 4;
		CLI::init();

		$this->call('serve');
	}
}
