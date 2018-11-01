<?php
namespace rothkj1022\Sanitizer;

class Sanitizer {
	private $config = [];
    private $purifier;

	// Class constructor
	public function __construct($config = []) {
		//initiate HTMLPurifier instance
		$purifier_config = \HTMLPurifier_Config::createDefault();
		if (sizeof($config) > 0) {
			foreach ($config as $directive => $value) {
				$purifier_config->set($directive, FS_CACHE);
			}
		}
		$def = $purifier_config->getHTMLDefinition(true);
		$def->addAttribute('a', 'target', 'Enum#_blank,_self,_target,_top');

		$this->purifier = new \HTMLPurifier($purifier_config);

	}

    public function sanitizeString ($str) {
        $str = $this->purifier->purify($str);
        return $str;
    }

    public function sanitize ($var, $fileNames = false) {
        //print_r($var);
        if (is_array($var)) {
            foreach ($var as $key => $val) {
                if (is_array($val)) {
                    $var[$key] = $this->sanitize($val);
                } else {
                    $var[$key] = $this->sanitizeString($val);
                    //echo $key.' has been sanitized.<br />';
                }
            }
        } else {
            $var = $this->sanitizeString($var);
        }

        if ($fileNames) {
			foreach($var as $key => $file) {
				if($file['size']){
					$var[$key]['name'] = preg_replace("([\.]{2,})", '', preg_replace("([^\w\d\s\-_~,\[\]\(\).])", '', $file['name']));
				}
			}
        }

        return $var;
    }

}
