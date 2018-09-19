<?php

class AposhSetup
{
	private $manifest = array();

	public function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'addScripts'));

		$this->manifest = $this->getAppManifest();
	}

	private function getAppManifest() {
		$manifest = file_get_contents(get_template_directory() . '/dist/assets.json');
		$manifest = (array) json_decode($manifest);

		return $manifest;
	}

	private function getAppStylesheet() {
		// return get_template_directory_uri() . '/dist/css/app.css';
		// return get_template_directory_uri() . '/dist/' . $this->manifest['app.css'];
		if (empty($this->manifest['app.css'])) {
			return false;
		}

		return get_home_url() . $this->manifest['app.css'];
	}

	private function getAppScript() {
		// return get_template_directory_uri() . '/dist/js/app.js';

		// return get_template_directory_uri() . '/dist/' . $this->manifest['app.js'];
		return get_home_url() . $this->manifest['app.js'];
	}

	private function getVendorScript() {
		// return get_template_directory_uri() . '/dist/js/app.js';

		// return get_template_directory_uri() . '/dist/' . $this->manifest['app.js'];
		return get_home_url() . $this->manifest['vendor.js'];
	}

	public function addScripts() {
		wp_enqueue_script('google/maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAZyFJjtN1lLLz3UoVF_mDelyTQOSZ0-rY');
		wp_enqueue_script('isotope', 'https://unpkg.com/isotope-layout@2/dist/isotope.pkgd.min.js', array('jquery'), null, true);

		wp_enqueue_script('aposh/vendor', $this->getVendorScript(), array(), null, true);
		wp_enqueue_script('aposh/js', $this->getAppScript(), array('aposh/vendor', 'jquery'), null, true);

		if ($this->getAppStylesheet()) {
			wp_enqueue_style('aposh/css', $this->getAppStylesheet(), false, null);
		}
	}
}
