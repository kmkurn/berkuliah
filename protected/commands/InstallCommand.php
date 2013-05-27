<?php

class InstallCommand extends CConsoleCommand
{
	public $status;

	public function actionIndex()
	{
		echo 'Installing ' . Yii::app()->name . "...\n";

		$this->status = true;
		$this->deleteTestingFiles();
		$this->setDatabase();

		echo "\n";
		echo $this->status ? "Installation successful.\n" : "Installation failed.\n";
	}

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
			unlink($file);
			echo "[OK]\n";
		}
	}

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
			$content = file_get_contents($sql);
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
}