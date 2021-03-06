<?php
/**
 * Configurations for Strawberry MVC
 * 
 * @package System
 * @author Carl-Johan Kihl
 * @since 2013-08-14 
 */

/**
 * @var array $config All global configurations is stored here
 */
$config = array();

/**
 * Acces to global configurations, 
 * @param type $key see your apps configuration file for accessible values
 * @param type $value if value is set, overwrite the old value
 * @return string the value or the old one if overwritten
 */
function config($key = null,$value=null) {
	global $config;
        if($key==null) return $config;
        
	if($value==null) {
		return isset($config[$key]) ? $config[$key] : null;
	} else {
                $old = isset($config[$key]) ? $config[$key] : null;
		$config[$key] = $value;
                return $old;
	}
}

/**
 * Create a local or external url 
 * 
 * If the input is null or 'this' the current url will be returned,
 * else it will append the string to the base_url. If the string starts with a
 * protocol it will not be appended to the base url.
 * 
 * @param string $url The url input 
 * @return string the correct url
 */
function url($url=null) {
    
    if($url===null || $url=='this') {
        return 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }
    
    //Check if the string starts with a protocol, if so just return the url
    if (preg_match("~^(?:f|ht)tps?://~i", $url)) {
        return $url;
    }
    
    return config('site_url').'/'.$url;
}


config('system_version','1.3');
config('system_lib_path',SYS_PATH.'/lib');