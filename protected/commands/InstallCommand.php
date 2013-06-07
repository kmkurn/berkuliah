<?php

/**
 * The installation command for this application.
 *
 * @author Ashar Fuadi <fushar@gmail.com>
 */
class InstallCommand extends CConsoleCommand
{
	/**
	 * Whether the installation succeeded.
	 */
	public $status;


	/**
	 * Runs the installation script.
	 */
	public function actionIndex()
	{
		echo 'Installing ' . Yii::app()->name . "...\n";

		$this->status = true;
		$this->changeDirectoryPermission();
		$this->deleteTestingFiles();
		$this->setDatabase();
		$this->switchMode();

		echo "\n";
		echo $this->status ? "Installation successful.\n" : "Installation failed.\n";
	}


	/**
	 * Changes directory permissions to 777.
	 */
	private function changeDirectoryPermission()
	{
		$dirs = array(
			'protected/runtime',
			'notes',
			'assets',
			'photos',
		);

		foreach ($dirs as $dir)
		{
			echo "Changing permission of $dir... ";
			if ( ! @chmod($dir, 0777))
			{
				echo "[FAILED]\n";
				$this->status = false;
				break;
			}
			echo "[OK]\n";
		}
	}


	/**
	 * Deletes files for testing purposes.
	 */
	private function deleteTestingFiles()
	{
		$files = array(
			'index-test.php',
			'.travis.yml',
			'install-dependencies.sh',
			'mysql-schema.sh',
			'protected/tests/*',
			'protected/config/travis.php',
		);

		foreach ($files as $file)
		{
			echo "Deleting $file... ";
			@unlink($file);
			echo "[OK]\n";
		}
	}

	/**
	 * Creates schema and inserts initial data.
	 */
	private function setDatabase()
	{
		if ( ! $this->status)
			return;

		$sqls = array(
			'protected/data/berkuliah.sql',
			'protected/data/bk_faculty.sql',
			'protected/data/bk_course.sql',
			'protected/data/bk_badge.sql',
		);

		foreach ($sqls as $sql)
		{
			echo "Executing $sql... ";
			$content = @file_get_contents($sql);
			$cmd = Yii::app()->db->createCommand($content);

			try
			{
				$cmd->execute();
			}
			catch (CException $e)
			{
				echo "[FAILED]\n";
				$this->status = false;
				break;
			}
			echo "[OK]\n";
		}
	}

	/**
	 * Switches the application to production mode.
	 */
	private function switchMode()
	{
		echo "Switching to production mode... ";
		if ( ! @rename('index-production.php', 'index.php'))
		{
			echo "[FAILED]\n";
			$this->status = false;
			break;
		}
		echo "[OK]\n";
	}
}