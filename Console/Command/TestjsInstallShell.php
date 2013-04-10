<?php

class TestjsInstallShell extends AppShell {
	public function main() {
		$file = 'test.ctp';
		$viewPath = APP . 'View' . DS . 'Pages' . DS . $file;
		$here = dirname(dirname(__FILE__)) . DS . 'tmpl' . DS . $file;
		if (!file_exists($viewPath)) {
			$content = file_get_contents($here);
			$handle = fopen($viewPath, 'w');
			fwrite($handle, $content);
			fclose($handle);
			$this->out("Wrote the default $file template to $viewPath");
		} else {
			$this->out("A $file already exists in View/Pages");
		}
	}
}
