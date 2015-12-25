<?php
define('DB_NAME', 'DOMAINNAME');
define('DB_USER', 'root');
define('DB_PASSWORD', 'niggerwut');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
define('LOGGED_IN_KEY',    '87+2@O2GH1XrMbOKOI-e?<b7==.vJZ+cAI4+m]bO>f]Sd_.*7Y9XH,Dz|Y-|+^NK');
define('NONCE_KEY',        ']O;$sH1m6K p]&5|JPh+U|.yv`:*j; b}%pjhIrCJ0Cm/,^Ny$/Z~, =MyNR!-TY');
define('AUTH_SALT',        'sISX%.2nY(Kis-n/I07=@lKbC=.`N+Q8<VPnEFM//YK-twYv2+|`/`- M[*KFL:1');
define('SECURE_AUTH_SALT', 'Pb~uT#0+j>p>w=GD8&Gatms,CkvxwsA`ye<3iQ$c<EATR#T_mq.t)Rah&tF-]i$U');
define('LOGGED_IN_SALT',   '$=-5S|lET){!!JT7..}|KDw}JK$zT+f{:8kUEmf$IjL6:PK]6EN=TTd!smm c_^O');
define('NONCE_SALT',       'CFq0@2JHb]qF-NcL;ue<a0A5y3A9b:s&3O3`?7na6g,l+6#O1<.88|i8_ +;=kkZ');
$table_prefix  = 'wp_';
define('WP_DEBUG', false);
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

