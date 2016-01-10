<?php
/*
Plugin Name: phpBay Lite Plugin for Wordpress
Plugin URI: http://www.wiredstudios.com/phpbay/
Description: Add eBay auction listings to your Wordpress posts.
Version: 1.5.3
Date: July 5th, 2008
Author: Wade Wells
Author URI: http://www.phpbay.com
*/ 
function PBL_admin_panel() {  
$qVh0gqGnK = '1.5.3';  
 
if (isset($_POST["\x50B\114_u\x70\x64a\164\145\144"])) {  
$PBL_aff_type = $_POST["PBL_aff_type"]; $PBL_ebay_pid = $_POST["PBL_ebay_pid"]; $PBL_ebay_cid = $_POST["PBL_ebay_cid"]; $PBL_ebay_logo = $_POST["PBL_ebay_logo"]; $PBL_siteId = $_POST["PBL_siteId"];  
update_option("PBL_aff_type",$PBL_aff_type); update_option("PBL_ebay_pid",$PBL_ebay_pid); update_option("PBL_ebay_cid",$PBL_ebay_cid); update_option("PBL_ebay_logo",$PBL_ebay_logo); update_option("PBL_siteId",$PBL_siteId);  
echo '<div id="message" class="updated fade"><p>phpBay Lite options saved.</p></div>';  
} else {  
 
$PBL_aff_type = get_option("PBL_aff_type"); $PBL_ebay_pid = get_option("PBL_ebay_pid"); $PBL_ebay_cid = get_option("PBL_ebay_cid"); $PBL_ebay_logo = get_option("PBL_ebay_logo"); $PBL_siteId = get_option("PBL_siteId"); }  
 
?>
<div class="wrap">
  	<h2>phpBay Lite Wordpress Plugin Version <? echo $qVh0gqGnK; ?></h2>
  	<form method="post">
<fieldset class="options">
  <legend>Affiliate Settings</legend>

  <p><label><strong>Select Affiliate Type:</strong> &nbsp;&nbsp;</label>
  <select name="PBL_aff_type">
    <option value="afepn"<?php if ($PBL_aff_type == "\141\x66\145\x70\156") {echo " \x73\x65\154\x65\x63\x74\145d";} ?>>Ebay Partner Network</option>
    <option value="afmp"<?php if ($PBL_aff_type == "\141\146\155\x70") {echo " \163\145\x6c\145ct\x65d";} ?>>Mediaplex</option>
    <option value="aftd"<?php if ($PBL_aff_type == "\141\146td") {echo " \163\145\x6ce\x63\x74\145d";} ?>>TradeDoubler</option>
    <option value="afan"<?php if ($PBL_aff_type == "a\146a\x6e") {echo " \163\x65\x6cect\145d";} ?>>Affilinet</option>
    <option value="afcj"<?php if ($PBL_aff_type == "a\x66c\152") {echo " \x73e\154e\143\x74\x65\144";} ?>>Commission Junction</option>
  </select>
  </p>
  
  <p><label><strong>Enter Your Ebay PID (or Campaign ID):</strong> &nbsp;&nbsp;</label>
  <input name="PBL_ebay_pid" type="text" value="<?php echo $PBL_ebay_pid ?>" maxlength="20" />
  </p>
  
  <p><label><strong>Enter Your Custom ID:</strong> &nbsp;&nbsp;</label>
  <input name="PBL_ebay_cid" type="text" value="<?php echo $PBL_ebay_cid ?>" maxlength="20" />
  </p>
  
  <p><label><strong>Display Ebay Logo?</strong> &nbsp;&nbsp;</label>
  <input name="PBL_ebay_logo" type="radio" value="1" <? if ($PBL_ebay_logo == "1") {echo "\143hec\153e\x64";} ?> /> Yes
  <input name="PBL_ebay_logo" type="radio" value="0" <? if ($PBL_ebay_logo == "0") {echo "\x63\150\x65\x63\153\x65d";} ?> /> No
  </p>
  
<br />

phpBay Lite Wordpress Plugin now supports selling items from Ebay in 14 different countries.  United States is default, but you can select any of the 14 other countries to sell items in your local country of choice.  The currency and language of the country you select will be automatically set.
<br /><br />
<select name="PBL_siteId">
<option value="0"<?php if ($PBL_siteId == "0") {echo " se\154\x65\143\x74e\144";} ?>>United States</option>
<option value="15"<?php if ($PBL_siteId == "15") {echo " s\145\x6c\145\x63\164ed";} ?>>Australia</option>
<option value="16"<?php if ($PBL_siteId == "16") {echo " s\x65\154e\143t\145\x64";} ?>>Austria</option>
<option value="123"<?php if ($PBL_siteId == "123") {echo " s\x65lec\x74\145\x64";} ?>>Belgium</option>
<option value="2"<?php if ($PBL_siteId == "2") {echo " sele\143\x74e\x64";} ?>>Canada</option>
<option value="71"<?php if ($PBL_siteId == "71") {echo " \163\145\x6c\x65\143\164\145\x64";} ?>>France</option>
<option value="77"<?php if ($PBL_siteId == "77") {echo " \163elec\164\x65\x64";} ?>>Germany</option>
<option value="203"<?php if ($PBL_siteId == "203") {echo " \163\x65\154\x65\143\164e\144";} ?>>India</option>
<option value="205"<?php if ($PBL_siteId == "205") {echo " \x73\x65l\145c\x74\145d";} ?>>Ireland</option>
<option value="101"<?php if ($PBL_siteId == "101") {echo " \163e\x6c\x65c\x74\145\144";} ?>>Italy</option>
<option value="146"<?php if ($PBL_siteId == "146") {echo " \x73\145\154\x65\x63\x74\x65\144";} ?>>Netherlands</option>
<option value="186"<?php if ($PBL_siteId == "186") {echo " \163\x65l\145\143te\x64";} ?>>Spain</option>
<option value="193"<?php if ($PBL_siteId == "193") {echo " \163e\x6c\x65\143\164e\144";} ?>>Switzerland</option>
<option value="3"<?php if ($PBL_siteId == "3") {echo " s\145\x6ce\143\x74\145d";} ?>>United Kingdom</option>
</select>
</fieldset>
<input type="hidden" name="PBL_updated" value="1"/>
<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options') ?> &raquo;" /></p>
</form>
</div>
<p>&nbsp;</p>
<div class="wrap">
<h2>phpBay Lite Instructions</h2>
<p>phpBay Lite is the original free Ebay plugin for Wordpress.</p>
<p>When writing or editing a post, a new button will appear on the button panel as "pBL" (in the "Code" tab) which stands for <strong>phpBay Lite</strong>.  Just place your cursor in the text window where you want to display auctions and press the pBL button and it will insert the pre-formatted code for you.</p>
<p>There are two parameters used in the tag.  The first is the keyword(s) of what you want to list, the second is the number of listings you want displayed.  Example: <br />
<pre>
[phpbay]apple ipod, 10[/phpbay]
</pre>
<p><strong>For the ultimate Ebay plugin for Wordpress</strong>, upgrade to our <a href="http://www.phpbay.com/products.html" target="_blank"><strong>phpBay Pro</strong></a> product.  It provides more options, mod_rewrite, masked affiliate urls, support for specific categories, min/max price, min/max bid, items by specific seller, geo ip targeting, column or row layouts, alternating row colors, hover over item highlighting, paging of results, access to our members only forum and many other features!</p>
<br />
<p align="center"><small>For updates to this script visit <a href="http://www.phpbay.com/products.html" target="_blank">phpBay</a>.</small></p>
</div>
<?php }  
 
function add_admin_panel() { if (function_exists('add_options_page')) { add_options_page('phpBay Lite', 'phpBay Lite', 8, basename(__FILE__), 'PBL_admin_panel'); } }  
 
 
class XLZ18gG1g{ var $title = ""; var $jFh2dgOCI = ""; var $aYM22gfc5 = ""; var $bpT23gGZ4 = ""; var $lVS47g9PD = ""; var $OSt7g0dZY = ""; var $qoO19gAUz = ""; var $ekV8gb3DG = ""; var $rZJ6glaFc = ""; var $fYUag2UGE = ""; var $SSo52gUal = ""; var $dkO20g6Z4 = ""; var $ReI4cgGFE = ""; var $Piq15gG3A = ""; var $aEd16gbVY = ""; var $eb_siteId = 0; var $eb_language = ""; var $LPV14gp9V = ""; var $bAN13g609 = ""; var $mEb17gi81 = ""; function listings($keywords, $pYJ33grm9) {  
$this->mEb17gi81 = $keywords; $this->mEb17gi81 = urlencode($this->mEb17gi81); $this->bAN13g609 = urlencode($this->bAN13g609); $this->Piq15gG3A = "\x68\164\164\x70://\x72\x73s.api.\145b\x61y.co\155/\x77s/\162\x73\163\141\x70i?\x46\145\145\144Name=\123\x65\141\162\143\150\x52e\163\165\x6c\x74s&si\164eI\x64=" . $this->eb_siteId . "&\154\x61\156\x67\x75\141ge=". $this->eb_language . "&\157\x75\164\x70\x75\164=\x52\x53\123\0620&\x63\x61\164r\x65\x66=C\065&s\141cq\171=&s\x61\143\x75\162=0&\x66\163o\x70=1&\x66\163\157\x6f=1&\x66r\157\155=\122\066&\163\x61\x63\161\x79\x6f\160=g\145&s\141\163\x6cc=0&\x66\154o\x63=1&\x73a\160\x72clo=&\x73\141p\x72\143\x68\151="; $this->Piq15gG3A .= "&s\141af\146=" . $this->aEd16gbVY . "&\146\164r\x76=1&\x66tr\164=1&\146c\x6c=3&" . $this->aEd16gbVY . "=" . $this->LPV14gp9V; if ($this->aEd16gbVY == "\141\x66\x65p\x6e") { $this->Piq15gG3A .= "&\143\x75\163\x74\157\155i\144=" . urlencode($this->bAN13g609); } $this->Piq15gG3A .= "&\146\162\160p=10&\x6eo\x6a\x73\160\x72=\x79&\x73a\x74i\164l\x65=" . $this->mEb17gi81 . "&\163\x61\143a\x74=-1&s\x61\163\x6c\x6fp=1&\x61f\155p=&f\163\163=0"; if (!isset($pYJ33grm9)) {$pYJ33grm9 = 10;} error_reporting(0);  
$kVs36gk_Z = new kVs36gk_Z; $ble49g73K = ""; $count = 0; $kVs36gk_Z->Eos1egq1Z($this->Piq15gG3A); foreach ($kVs36gk_Z->EKP28gl0K as $item) { $count++;  
$item['description'] = $this->FVj2egc7j($item['description']);  
$this->title = str_replace("&", "&a\155\160;", $item['title']);  
preg_match('/(?<=src=")(.*?)(?=")/', $item['description'], $PdG31gm7s); $this->aYM22gfc5 = $PdG31gm7s[0];  
 
if ($this->aYM22gfc5 == "") { $img = strstr($item['description'], 'http://thumbs.'); $pos = strpos($img, '.jpg'); $pos = $pos + 4; $img = substr($img, 0, $pos); $this->aYM22gfc5 = $img; }  
preg_match('%(?<=<strong>)(.+?)(?=</strong>)%', $item['description'], $PdG31gm7s); $this->lVS47g9PD = $PdG31gm7s[0];  
preg_match('%(?<=</strong>)(.+?)(?=\r\n)%', $item['description'], $PdG31gm7s); $this->OSt7g0dZY = $PdG31gm7s[0];  
preg_match('%(?<=End Date: )(.+?)(?=\r\n)%', $item['description'], $PdG31gm7s); $this->qoO19gAUz = $PdG31gm7s[0];  
$this->jFh2dgOCI = $item['link']; $this->jFh2dgOCI = str_replace("&", "&\x61\155p;", $this->jFh2dgOCI);  
$dkO20g6Z4 = explode("\r\n", $item['description']); for ($orV21gLEa = 0; $orV21gLEa <= count($dkO20g6Z4); $orV21gLEa ++) { $PpZ2bg1RL = $dkO20g6Z4[$orV21gLEa]; $pos = strpos($PpZ2bg1RL, '<a href="'); if ($pos === false) {  
} else {  
$lbr1agNj_ = strpos($PpZ2bg1RL, '">'); $PdG31gm7s[1] = substr($PpZ2bg1RL, $pos + 9, $lbr1agNj_ - $pos - 9);  
$PdG31gm7s[1] = str_replace(" ", "+", $PdG31gm7s[1]); $pos = strpos($PdG31gm7s[1], 'A102'); if ($pos) { $this->bpT23gGZ4 = str_replace("&", "&\x61m\160;", $PdG31gm7s[1]); } $pos = strpos($PdG31gm7s[1], 'A103'); if ($pos) { $this->rZJ6glaFc = str_replace("&", "&\141\x6d\160;", $PdG31gm7s[1]); } $pos = strpos($PdG31gm7s[1], 'A104'); if ($pos) { $this->SSo52gUal = str_replace("&", "&\x61m\160;", $PdG31gm7s[1]); } $pos = strpos($PdG31gm7s[1], 'A105'); if ($pos) { $this->fYUag2UGE = str_replace("&", "&\x61\155\160;", $PdG31gm7s[1]); } } } $this->ORA1cgP0A();  
 
 
 
 
if (($count) >= $pYJ33grm9) {break;} } if (get_option("PBL_ebay_logo") == "1") {$this->dkO20g6Z4 .= '<p align="center"><img src="wp-content/plugins/phpbaylite/logo.gif" alt="" /></p>';} if ($kVs36gk_Z->VcDegoLHH <= 0) { $this->dkO20g6Z4 = "\116\x6f i\x74\145\x6d\x73 m\141\x74\x63\150ing \x79\x6f\x75r k\145y\x77\157rds \x77er\145 \146\x6fu\156\144.<\x62\x72>\r\n"; } } function FVj2egc7j($NOP2cgga6) { $NOP2cgga6 = str_replace("<t\x72>", "\r\n  <t\x72>\r\n", $NOP2cgga6); $NOP2cgga6 = str_replace("<t\144>", "    <\164d>\r\n", $NOP2cgga6); $NOP2cgga6 = str_replace("</\141>", "</\141>\r\n", $NOP2cgga6); $NOP2cgga6 = str_replace("</\x74d>", "    </td>\r\n", $NOP2cgga6); $NOP2cgga6 = str_replace("</\x74\x72>", "  </\x74r>\r\n", $NOP2cgga6); $NOP2cgga6 = str_replace("</t\141\x62l\145>", "</\164\141b\x6c\x65>\r\n", $NOP2cgga6); $NOP2cgga6 = str_replace("<\x62\162 />", "\r\n    <\142\x72 />\r\n", $NOP2cgga6); return $NOP2cgga6; } function ORA1cgP0A() { $poGfgcg4G = "\r\n"; $dkO20g6Z4 = '<table width="100%" border="0" cellspacing="5" cellpadding="5">' . $poGfgcg4G; $dkO20g6Z4 .= '  <tr>' . $poGfgcg4G; $dkO20g6Z4 .= '    <td width="100" align="left"><a href="' . $this->bpT23gGZ4 . '" rel="nofollow" target="_blank"><img src="' . $this->aYM22gfc5 . '" alt="' . $this->KGF46grkr($this->title) . '" border="0" /></a></td>' . $poGfgcg4G; $dkO20g6Z4 .= '    <td>' . $poGfgcg4G; $dkO20g6Z4 .= '      <a href="' . $this->jFh2dgOCI . '" rel="nofollow" target="_blank">' . $this->title . '</a><br />' . $poGfgcg4G; $dkO20g6Z4 .= '      <span style="color:#FF0000;font-weight:bold">' . $this->lVS47g9PD . '</span> <span style="font-weight:bold">' . $this->OSt7g0dZY . '</span><br />' . $poGfgcg4G; $dkO20g6Z4 .= '      <span style="font-weight:bold">Auction Ends:</span> ' . $this->qoO19gAUz . '<br />' . $poGfgcg4G; if ($this->rZJ6glaFc > "") { $dkO20g6Z4 .= '      <a href="' . $this->rZJ6glaFc . '" rel="nofollow" target="_blank">' . "\102\151\144 \157n th\151\x73 \x49\164\145\x6d" . '</a>'; } if ($this->fYUag2UGE > "") { if ($this->rZJ6glaFc > "") { $dkO20g6Z4 .= "      &\156\x62s\x70; | "; } else { $dkO20g6Z4 .= "      "; } $dkO20g6Z4 .= '<a href="' . $this->fYUag2UGE . '" rel="nofollow" target="_blank">' . "Bu\x79 t\x68\151\x73 \111te\x6d" . '</a>'; } $dkO20g6Z4 .= '      &nbsp; | <a href="' . $this->SSo52gUal . '" rel="nofollow" target="_blank">' . "W\x61\164\143\x68 \164\150\151s \111\x74\x65\155" . '</a>' . $poGfgcg4G; $dkO20g6Z4 .= '    </td>' . $poGfgcg4G; $dkO20g6Z4 .= '  </tr>' . $poGfgcg4G; $dkO20g6Z4 .= '</table>' . $poGfgcg4G . $poGfgcg4G; $this->dkO20g6Z4 .= $dkO20g6Z4; } function KGF46grkr($text) { $text = str_replace('/',' ',$text); $text = str_replace('-',' ',$text); $text = str_replace(' & ',' ',$text); $text = str_replace('"',' ',$text); $text = str_replace(".",' ',$text); $text = str_replace("'",' ',$text); $text = str_replace(",",' ',$text); $text = str_replace(' ','-',$text); $text = str_replace('-----','-',$text); $text = str_replace('----','-',$text); $text = str_replace('---','-',$text); $text = str_replace('--','-',$text); $text = str_replace(':','',$text); $text = str_replace('#','',$text); $text = str_replace('(','',$text); $text = str_replace('%','',$text); $text = str_replace(')','',$text); $text = strtolower($text); return $text; } }  
 
 
 
class kVs36gk_Z { var $VcDegoLHH = 0; var $type = 0; var $jDR4dghd9 = ""; var $EKP28gl0K = array(); var $jTtcgMMUE = array(); function opening_element($jDG54gLhA, $qGk32gkYq, $pzi5gnXVg) { $this->jDR4dghd9 = $qGk32gkYq; if($qGk32gkYq == "\103\x48\x41\x4e\x4e\x45L"){ $this->type = 1; } else if($qGk32gkYq == "\111\x54\105\115") { $this->type = 2; } } function closing_element($jDG54gLhA, $qGk32gkYq){ $this->jDR4dghd9 = ""; if($qGk32gkYq == "\111\124\105\115") { $this->type = 0; $this->VcDegoLHH++; } else if($qGk32gkYq == "\x43\110A\x4e\x4e\105\114") { $this->type = 0; } } function c_data($jDG54gLhA, $mtU11g8fs){ if($this->jDR4dghd9 == "\x54\x49\124\114\x45" || $this->jDR4dghd9 == "\x44E\123C\122\x49\x50T\x49\x4fN" || $this->jDR4dghd9 == "\114\111\x4e\x4b") { if($this->type == 1) { $this->jTtcgMMUE[strtolower($this->jDR4dghd9)] = $mtU11g8fs; } else if($this->type == 2) { $this->EKP28gl0K[$this->VcDegoLHH][strtolower($this->jDR4dghd9)] .= $mtU11g8fs; } } } function Eos1egq1Z($YEX55gtMn) { $jDG54gLhA = xml_parser_create(); xml_set_object ($jDG54gLhA, $this); xml_parser_set_option($jDG54gLhA, XML_OPTION_CASE_FOLDING, TRUE); xml_parser_set_option($jDG54gLhA, XML_OPTION_SKIP_WHITE, TRUE); xml_set_element_handler($jDG54gLhA, "opening_element", "closing_element"); xml_set_character_data_handler($jDG54gLhA, "c_data"); $Ckn1dgOMR = file($YEX55gtMn);  
 
if ($Ckn1dgOMR == false) { $ch = curl_init($YEX55gtMn); curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); $MFT53gkMZ = curl_exec($ch); curl_close($ch); $Ckn1dgOMR = explode("\n", $MFT53gkMZ); } foreach($Ckn1dgOMR as $PpZ2bg1RL){ if(!xml_parse($jDG54gLhA, $PpZ2bg1RL)) { die("C\x6f\165\154\144 \156\157t \x70\141\x72s\145 \146i\154\145."); } } } }  
function phpBayLite($text) {  
$text = str_replace("<\160>[phpbay]", "[phpbay]", $text); $text = str_replace("[/phpbay]</\x70>", "[/phpbay]", $text); if (preg_match('%(\\[phpbay\\](.*?)\\[\\/phpbay\\])%', $text, $PdG31gm7s)) { $lSl35gbT7 = $PdG31gm7s[0]; $lSl35gbT7 = str_replace("[phpbay]", "", $lSl35gbT7); $lSl35gbT7 = str_replace("[/phpbay]", "", $lSl35gbT7); $nUR51gYtm = explode(",", $lSl35gbT7); $kw = trim($nUR51gYtm[0]); $pYJ33grm9 = trim($nUR51gYtm[1]); if ($kw) { $XLZ18gG1g = new XLZ18gG1g();  
$XLZ18gG1g->aEd16gbVY = get_option("PBL_aff_type"); $XLZ18gG1g->LPV14gp9V = get_option("PBL_ebay_pid"); $XLZ18gG1g->bAN13g609 = get_option("PBL_ebay_cid");  
$XLZ18gG1g->eb_siteId = get_option("PBL_siteId"); if ($XLZ18gG1g->eb_siteId == "") {$XLZ18gG1g->eb_siteId = "0";} if ($XLZ18gG1g->eb_siteId == "0") {$XLZ18gG1g->eb_language = "\145\156-U\123";} if ($XLZ18gG1g->eb_siteId == "15") {$XLZ18gG1g->eb_language = "\145\x6e-\x41\x55";} if ($XLZ18gG1g->eb_siteId == "16") {$XLZ18gG1g->eb_language = "\x64\145-\101\x54";} if ($XLZ18gG1g->eb_siteId == "123") {$XLZ18gG1g->eb_language = "\156\154-\102\x45";} if ($XLZ18gG1g->eb_siteId == "2") {$XLZ18gG1g->eb_language = "e\156-\x43\101";} if ($XLZ18gG1g->eb_siteId == "71") {$XLZ18gG1g->eb_language = "\x66\x72-F\x52";} if ($XLZ18gG1g->eb_siteId == "77") {$XLZ18gG1g->eb_language = "de-DE";} if ($XLZ18gG1g->eb_siteId == "203") {$XLZ18gG1g->eb_language = "\x65\x6e-\x49\116";} if ($XLZ18gG1g->eb_siteId == "205") {$XLZ18gG1g->eb_language = "";} if ($XLZ18gG1g->eb_siteId == "101") {$XLZ18gG1g->eb_language = "\x69\x74-\111\124";} if ($XLZ18gG1g->eb_siteId == "146") {$XLZ18gG1g->eb_language = "n\x6c-NL";} if ($XLZ18gG1g->eb_siteId == "186") {$XLZ18gG1g->eb_language = "e\163-E\x53";} if ($XLZ18gG1g->eb_siteId == "193") {$XLZ18gG1g->eb_language = "d\x65-C\110";} if ($XLZ18gG1g->eb_siteId == "3") {$XLZ18gG1g->eb_language = "\x65n-G\102";}  
 
if ($XLZ18gG1g->aEd16gbVY == "") { echo "\120\154\x65\141\163e \x73\x65t \164h\145 A\146\146\151\x6ciate Type \x61n\x64 \x45\142\141y \120I\104 \151n y\x6f\165\162 <\x73\164\x72\157\156g>a\x64\x6d\x69n -> options -> phpBay L\x69t\145</s\x74\x72\x6f\x6eg> co\156trol \160\x61n\x65l."; return $text; exit; } $XLZ18gG1g->listings($kw, $pYJ33grm9); $XLZ18gG1g->dkO20g6Z4 = "<d\x69\x76>\r\n" . $XLZ18gG1g->dkO20g6Z4 . "\r\n</\144\151\x76>\r\n"; $text = str_replace($PdG31gm7s[0], $XLZ18gG1g->dkO20g6Z4, $text); } } return $text; } function pb_add_button() { $Ack26gU3s = '[phpbay]keyword(s), 10[/phpbay]'; BNd44gS7o("", 'pBL', "", $Ack26gU3s); sNz43gE54("", 'pBL', "", $Ack26gU3s); }  
add_filter('the_content', 'phpBayLite');  
add_action('admin_menu','add_admin_panel');  
include('phpbaysnap.php'); add_action('init', 'pb_add_button'); ?>