<?php   if (!class_exists('phpbay')) : class phpbay { var $YAG4agKT9 = false; var $CMX9gYotI = array('post'=>array(),'page'=>array(),'any'=>array()); var $kVf30gIUo = array(); function pJK4bgj3P() { add_action('edit_form_advanced', array(&$this, 'edit_form_advanced')); add_action('edit_page_form', array(&$this, 'edit_page_form')); add_filter('mce_plugins', array(&$this, 'mce_plugins')); add_action('admin_footer', 'Modify_SwitchEditors_Action'); } function eSn1fg4kZ() { $dispatch = isset($_POST['phpbaydispatch']) ? $_POST['phpbaydispatch'] : @$_GET['phpbaydispatch']; if($dispatch != '') { auth_redirect(); $selection = isset($_POST['selection']) ? $_POST['selection'] : @$_GET['selection']; $selection = apply_filters($dispatch, $selection); die($selection); } if(isset($_GET['docss'])) { auth_redirect(); do_action('marker_css'); die(); } } function edit_form_advanced() { if (!$this->YAG4agKT9) { $this->rFR34gbTR('post'); $this->YAG4agKT9 = true; } } function edit_page_form() { if (!$this->YAG4agKT9) { $this->rFR34gbTR('page'); $this->YAG4agKT9 = true; } } function mce_plugins($plugins) { if (count($this->kVf30gIUo) > 0) { echo "\166\x61r p\150\160bay_\x6d\141\x72ke\x72s = \x6e\x65\x77 \101\162\162\x61\171(\n"; $JRHdg7niZ = ''; foreach ($this->kVf30gIUo as $oqP2agXIo => $LNe50gZ9q) { echo "{$JRHdg7niZ}\"{$oqP2agXIo}\""; $JRHdg7niZ = "\n,"; } echo "\n);\n"; echo "\x76\x61r \160h\x70\x62\141\171_c\x6ca\163\163e\163 = \156e\167 \101\162r\x61y(\n"; $JRHdg7niZ = ''; foreach ($this->kVf30gIUo as $oqP2agXIo => $LNe50gZ9q) { echo "{$JRHdg7niZ}\"{$LNe50gZ9q}\""; $JRHdg7niZ = "\n,"; } echo "\n);\n"; ?>

function TinyMCE_phpbay_initInstance(inst) {
	tinyMCE.importCSS(inst.getDoc(), "<?php echo $this->AjF45gcBM(); ?>?docss=true");
}

function TinyMCE_phpbay_parseAttributes(attribute_string) {
	var attributeName = "";
	var attributeValue = "";
	var withInName;
	var withInValue;
	var attributes = new Array();
	var whiteSpaceRegExp = new RegExp('^[ \n\r\t]+', 'g');
	var titleText = tinyMCE.getLang('lang_phpbay_more');
	var titleTextPage = tinyMCE.getLang('lang_phpbay_page');

	if (attribute_string == null || attribute_string.length < 2)
		return null;

	withInName = withInValue = false;

	for (var i=0; i<attribute_string.length; i++) {
		var chr = attribute_string.charAt(i);

		if ((chr == '"' || chr == "'") && !withInValue)
			withInValue = true;
		else if ((chr == '"' || chr == "'") && withInValue) {
			withInValue = false;

			var pos = attributeName.lastIndexOf(' ');
			if (pos != -1)
				attributeName = attributeName.substring(pos+1);

			attributes[attributeName.toLowerCase()] = attributeValue.substring(1).toLowerCase();

			attributeName = "";
			attributeValue = "";
		} else if (!whiteSpaceRegExp.test(chr) && !withInName && !withInValue)
			withInName = true;

		if (chr == '=' && withInName)
			withInName = false;

		if (withInName)
			attributeName += chr;

		if (withInValue)
			attributeValue += chr;
	}

	return attributes;
}

function TinyMCE_phpbay_cleanup(type, content) {
	switch (type) {
		case "initial_editor_insert":
			content = TinyMCE_phpbay_cleanup("insert_to_editor", content);
			alert('foo');
			
			break;
	
		case "insert_to_editor":
			var startPos = 0;

			for(z=0;z<phpbay_markers.length;z++) {
				var startPos = 0;
				while ((startPos = content.indexOf('<!--' + phpbay_markers[z], startPos)) != -1) {
					var adType = "";
					var adTypePos = -1;
					var adTypePos = content.indexOf('#', startPos);
					var endPos = content.indexOf('-->', startPos);
					
					//extract AdManager adType
					if ((adTypePos != -1) && (adTypePos < endPos))
						adType = "<!--" + content.substring(adTypePos, endPos) + "-->";
					//
					
					endPos += 3;
					// Insert image
					var contentAfter = content.substring(endPos);
					content = content.substring(0, startPos);
					content += '<img src="' + (tinyMCE.getParam("theme_href") + "/images/spacer.gif") + '" ';
					content += ' width="100%" ';
					content += 'alt="" class="' + phpbay_classes[z] + '" />';
					content += adType;
					content += contentAfter;
	
					startPos++;
				}
			}
			break;

		case "get_from_editor":
			var startPos = -1;
			while ((startPos = content.indexOf('<img', startPos+1)) != -1) {
				var endPos = content.indexOf('/>', startPos);
				var attribs = TinyMCE_phpbay_parseAttributes(content.substring(startPos + 4, endPos));

				for(z=0;z<phpbay_classes.length;z++) {
					if (attribs['class'] == phpbay_classes[z]) {
						endPos += 2;
						
						// reinstate AdManager adType
						adType = '';
						adTypePos = -1;
						adTypePos = content.indexOf('<!--#',endPos);
						if (adTypePos == endPos) {
							endPos = content.indexOf('-->', adTypePos);
							adType = content.substring(adTypePos + 4, endPos);
							endPos += 3;
						}
						//	
		
						var embedHTML = '<!--' + phpbay_markers[z] + adType + '-->';
		
						// Insert embed/object chunk
						chunkBefore = content.substring(0, startPos);
						chunkAfter = content.substring(endPos);
						content = chunkBefore + embedHTML + chunkAfter;
						break;
					}
				}
			}
			break;
	}

	return content;
}

<?php $plugins[] = 'phpbay'; } return $plugins; } function rFR34gbTR($type = 'any') { echo '<script type="text/javascript">
		var phpbay_request_uri = "' . $this->AjF45gcBM() . '";
		var phpbay_wproot = "' . get_settings('siteurl') . '";
		var mceButtonsAdded = 0;
		var qtButtonsAdded = 0;
		</script>' . "\n"; echo <<< ENDSCRIPT

<sc\162\x69pt \164\171\160\145="text/\152\141\x76\x61sc\x72\151\160\164">
a\x64\x64\x4co\141\x64\105\x76\x65\156\164(\x66\165\x6e\143t\x69o\x6e () { \167\x69n\x64\157\x77.\x73\145\164\x54i\x6de\x6f\165\x74('\160\x68p\142a\171_\141\x64\144\142u\x74\x74\x6f\156\x73()',1000); });
v\x61r p\150\160bay_\155o\172\151\x6c\154\141 = do\x63\165m\145nt.\x67\145\x74E\x6c\x65\x6d\x65\x6e\164\102y\111\x64&&!\x64\x6f\x63\165m\145nt.\x61\154\154;
\x66u\x6e\143\164i\x6fn \x70h\x70\x62ay_\x73\141\146\145\x63\154ic\x6b(\145)
{
	if(!\160\x68\160b\x61\171_m\x6f\x7a\x69\x6cla) {
		e.re\x74ur\156\126\141\154\x75\145 = \146\141lse;
		e.\x63\x61\x6e\x63\x65\x6c\102\x75\142b\154\145 = \x74\x72ue;
	}
}

\146\165\156ct\x69o\156 \x70\x68pb\141\x79_\141\x64\x64\105\x76e\x6et( ob\x6a, \164\x79\160\x65, \x66\x6e )
{
	\151f (\x6f\142\152.add\x45ve\156\x74\x4c\151\x73\164\145\156\145\x72)
		o\x62\152.\141\x64d\x45\x76\145\156t\x4c\151s\164\145\156\145\x72( \164\x79\x70\145, \146\x6e, \x66\x61\154\x73e );
	\145\154\163e \x69\146 (o\142\x6a.\141\164\x74\x61\x63hE\166\145nt)
	{
		\x6f\x62j["e"+ty\160\x65+\146n] = \x66n;
		o\x62\x6a[\x74\x79\x70\x65+f\x6e] = funct\151\x6f\156() { \x6fbj["\x65"+t\x79p\x65+\146\x6e]( \167\x69n\x64\157\x77.e\166\145nt ); }
		\x6fb\152.\141ttac\150E\x76\145n\164( "\x6fn"+ty\160\x65, \157b\152[\164yp\145+f\156] );
	}
}

f\x75\x6e\143\164\x69\x6f\x6e p\x68pbay_\x6e\x65\x77b\165\x74t\x6f\156(src, \141\x6c\x74, qttext) {
	\151\146(\167\x69\156\144\157\x77.\155\143\145\x74\157\x6f\154\x62a\x72) {
		\166ar \141\156\x63\150\x6f\162 = do\143\x75\155\x65\156\x74.\x63\162\145\141\164\145E\154\145\155\145\x6et('\101');
		a\156\x63\150or.s\x65\x74\101\164\164\162\x69\x62\x75\164\145('h\x72\145\x66', '\x6a\141\x76a\163\x63\162\151p\164:;');
		\x61nc\x68\x6fr.s\145\x74A\164tr\x69\142u\x74e('title', a\154t);
		\166\141r ne\x77\151\x6d\x61\147\145 = d\157\x63\x75\x6d\x65n\164.\143\x72\145ate\x45l\145\x6de\156t('I\x4dG');
		\x6e\x65\x77\x69\155\141\147\145.\163\x65tAtt\162i\x62u\x74e('src', src);
		\x6e\x65\167\x69\x6da\147\x65.s\145\x74\101t\164\162\x69\x62ute('\x61\154\x74', \141lt);
		\156\x65w\151\x6d\141\147\x65.s\145t\x41t\164r\x69\142\x75\x74\x65('c\x6c\141s\163', '\155c\145\102\165\164\x74o\156\x4e\x6f\x72\155\x61\154');
		\160hp\x62\141y_\141d\x64\x45\x76e\x6et(new\151\x6d\x61\147\x65, '\155ou\163\x65ov\145r', f\x75\156\143\164\151on() {\164in\x79M\x43E.s\x77i\164ch\x43l\141s\x73(\x74\150i\x73,'\x6d\143e\x42\165t\164\157\156\117\x76\145\x72');});
		\x70\x68\x70\142a\171_\141\x64\x64\x45v\x65n\164(n\x65wim\x61\x67\145, '\155\x6f\165\x73e\157\x75\164', \146\x75nct\x69\x6f\x6e() {\164\x69\x6eyMCE.\x73\167\151\164ch\103l\141s\163(\x74\150\x69s,'\155\x63\x65\102\x75t\164\157n\116o\162\155al');}); //\x72\x65\163to\162eCl\141\163\x73(\164\x68\151\x73)
		\160\x68pba\171_a\x64\144\x45\x76e\x6e\164(n\145\x77\x69m\x61\147\145, '\155o\x75s\x65do\167\x6e', \146\165\156\143\164\151\x6fn() {\x74iny\115C\105.\x72\x65\163\x74o\x72\145\x41\x6e\144\x53w\x69\x74\143h\103\x6c\x61\163\163(\164h\x69\x73,'\x6d\x63\x65\x42\165\x74\164\x6f\156\104o\x77\x6e');});
		\x61\x6e\x63\150\157r.\141\x70p\x65\156d\x43\150\x69\x6c\144(n\145w\151ma\x67\145);
		\x64\151\166\x73 = \155\x63e\164\x6f\x6f\x6c\142a\x72.\x67et\105\x6c\145\155\x65n\164\x73B\x79\x54ag\x4e\x61\155e('\x44I\x56');
		i\x66(divs.\x6c\145n\x67\164\x68 > 0)
			\155\x63\x65\x74\x6fol\x62\x61r.\x69n\x73\145r\164B\x65\146\x6fr\145(a\156\143\x68\157\x72, d\x69\x76\163[0]);
		\x65ls\145
			\155\x63\x65\164\157o\154\x62a\x72.\x61\160p\145\x6e\144C\150\151\154\144(a\x6e\x63\x68\157\x72);
		\155c\x65B\165t\x74o\156sA\x64\144\145d += 1;	
	}
	\x65\154\163e \x69\x66(\x77\151\156d\157w.\x71\x74\x74o\x6f\154b\141\x72)
	{
		\x76\141\x72 \141\x6ech\157r = \x64\157\143\x75m\x65\x6e\164.\143\x72\x65a\x74\145\x45\154\x65\155\x65nt('inp\x75\164');
		\141\x6e\x63h\x6f\162.typ\145 = 'button';
		\x61n\143\x68\157\162.\x76al\165\x65 = qttext;
		\x61\156c\150\157\162.c\154\141\x73s\116a\155\145 = '\x65d_\x62\165\164t\157\156';
		a\x6ech\157r.title = \x61\154\x74;
		\x61\156\143\x68o\162.\x69\144 = '\x65\144_' + a\x6ct;
		\x71tto\157l\x62\x61\x72.ap\x70\145nd\103\150\x69ld(\x61\156\x63\150o\x72);
		q\x74\102ut\x74\x6f\156sA\144\x64\x65\144 += 1;
	}	
	\162\x65\164\165\x72\x6e a\x6e\143hor;
}

\x66\165\156\143\x74io\156 \160h\x70\x62ay_\156\x65\167\x73ep\141r\141\164\157r() {
	if(m\143\145\164ool\x62\141r) {
		v\x61\162 \163e\160 = \144\157\143\x75\x6de\156\x74.\x63\162\145a\x74\145\105\154e\x6d\x65\x6e\164('\x49M\107');
  	s\145\x70.\x73\x65t\x41\x74t\x72ib\x75\164e('src', \x70\x68\x70\142\x61\171_\167\x70\x72\157ot + '/\x77\160-\151n\x63\154ud\145s/js/ti\x6eymc\x65/\x74\x68\145\155e\x73/\141d\x76\141nc\x65\144/\151m\141\x67e\163/separator.g\151\x66');
		\x73\x65p.\143\154\141s\163\x4e\141\x6d\x65 = '\x6d\x63\x65Separ\x61\x74\157\x72Lin\145';
		\x73\145\160.s\145tAt\x74\162\x69\142u\164\x65('\x63\x6cas\163', '\x6dc\145S\x65\160\141\162\141\x74\x6f\162Li\156e');
		\163e\x70.\163\x65\164\101\x74\164\x72i\142\165\164e('\150\145\151g\x68t', '20');
		\x73\145p.s\145\164\101\164\164\162\x69b\x75\164\145('\167id\x74\x68', '2');
		\x64iv\x73 = \x6dce\x74\x6fol\x62\141\x72.\147\145t\105le\155\x65\x6ets\102y\124a\147\x4e\141\x6d\145('DI\x56');
		\x69\146(\144ivs.\154\x65\156\x67\164h > 0)
			\x6d\x63\x65to\x6f\154\142\x61\162.\x69n\x73\145\x72\164\102\145\146o\x72\145(\x73e\160, \144ivs[0]);
		else
			\155c\x65\164\x6f\x6f\x6c\x62\141\x72.a\160pe\x6e\x64C\150i\x6c\x64(\x73e\160);
	}
}

\x66\x75\x6e\143t\x69o\x6e p\x68p\x62\141\171_s\x65\x74\164\145\x78t(text) {
	\x69\x66(\x77\151\x6e\144\x6f\x77.\x6d\x63e\x74\157\x6f\154b\x61\x72) {
		w\x69\x6e\144\x6f\167.t\151\x6eyMC\x45.\145\170e\143\111\156\x73\164a\156\143e\103\x6f\x6d\x6d\141\x6e\x64('c\x6f\156\x74\145\156\x74', '\x6d\x63\x65\111\156s\145\162tCo\x6e\164ent', fa\154\x73\x65, text);
		tin\171\x4d\x43E.\x65xe\x63C\x6f\x6d\x6da\156\x64("mce\103\x6ce\141\x6e\165\x70");
	} \145\154s\x65 {
		edI\x6e\163\x65\x72\x74\103\x6f\156te\x6e\164(\x65d\103\141\x6e\166\141s, text);
	}
}

\146\165\156\x63t\x69\157\156 php\x62\x61\x79_a\152\141\x78(dispatch) {
	\151\146(win\144o\167.m\143\x65to\157l\142\x61r) {
		selection = \164\151\x6eyMC\105.\147\x65\x74\x49\156st\x61\x6e\143e\102\x79I\144('\143\157n\x74e\156\x74').\x67\x65\x74\x53\x65\154e\x63\x74\145dT\145\x78\x74();
	}
	\145\154\x73\145 {	
		\x69\x66 (do\143\x75\155\145\156\x74.selection) {
			\x64o\143\165\155\x65n\x74.ge\x74\105\x6cem\x65\x6e\164\x42y\111\x64('\x63o\156t\x65\156\x74').fo\143us();
		  \x73\x65l = \x64oc\165\x6d\145nt.selection.\143r\x65\x61\164\145\122a\156\x67e();
			\151\x66 (\x73\x65l.text.l\x65\x6egth > 0) {
				selection = \x73e\154.text;
			}
			e\154\163e {
				selection = '';
			}
		}
		\145\154\163e {
			selection = '';
		}
	}

	va\x72 \x61\152\141\170 = \156\145\x77 \x73\x61\143k(\160h\160\142\x61\x79_\x72\145q\x75e\x73\x74_\165\162\x69);
	a\x6a\x61\170.s\145t\x56ar('\x70\x68\x70b\x61\x79\x64\x69spa\x74\x63h', dispatch);
	\x61\x6a\141\x78.\163\x65\x74\126a\162('selection', selection);
	a\x6a\x61\x78.onC\x6f\155\160\154et\x69on = \146\165\x6e\143t\x69\x6f\156 () {\160\x68\160b\x61y_\163\x65\x74\x74\x65\x78t(\x74\x68\151s.\x72es\160o\156\163e);};
	\x61\152\141\x78.\x72\165\156\x41\112\x41\130();
}

va\162 mc\x65to\x6f\154\x62\141\x72;
\166\141\162 qt\164ool\x62a\162 = d\x6f\143\165\155e\x6et.ge\x74\x45lem\x65\x6e\x74\102yI\144("\x65\144_\x74\x6f\x6fl\x62\141\x72");


fun\143\x74\151on \x70\x68\x70\x62a\171_\141d\x64\142ut\164\157\156\x73 () {
//	\151f(\167i\x6edo\x77.t\x69\x6ey\x4d\x43\105) {
		\x74\162\x79 {
      m\143\x65t\157\x6fl\142\x61\162 = d\x6f\143\x75m\x65\156\x74.\147\x65\164E\x6c\x65m\x65\156\x74\102\171\111\144('\155c\x65_\x65\144\151\x74o\x72_0_\164\157\157l\x62\x61\162');
		}
		\x63\141t\x63\x68(\x65) {
			set\x54\x69m\x65\157u\164('p\150\160\142\x61y_\x61\144\x64\142u\x74\164\157\156\163()', 5000);
			\162\145\164\165\x72\156;
		}
//	}

	 try {
	    if(\x6d\x63e\x74o\x6fl\142\x61\x72 && \x6d\143\x65\102ut\x74\157nsAd\144e\x64==0 || (mc\x65\x74\157\x6fl\x62\x61r==\156\165\154l) && \161\x74\102\x75\x74\164\157n\x73A\144d\145d==0){
ENDSCRIPT;
switch($type) { case 'any': $this->CMX9gYotI['any'] = array_merge($this->CMX9gYotI['post'], $this->CMX9gYotI['page'], $this->CMX9gYotI['any']); break; default: $this->CMX9gYotI[$type] = array_merge($this->CMX9gYotI[$type], $this->CMX9gYotI['any']); } $gAC4fgS8T = $this->CMX9gYotI[$type]; foreach ($gAC4fgS8T as $button) { if($button['type'] == 'separator') { echo "\160\x68p\142\x61y_n\x65ws\145p\141\162\141t\157\x72();\n"; } else { echo "\156\x65\167b\x74n = \160hp\142a\171_\156\x65\167\142\x75\x74\164o\156('{$button['src']}', '{$button['alt']}', '{$button['qttext']}');\n"; switch($button['type']) { case 'text': echo "p\x68p\142\x61y_\x61\144dE\x76en\164(n\x65wbt\x6e, '\143\154\x69\143\x6b', \146u\x6e\143\x74i\157n(e) {\x70\x68\x70\142a\171_\x73\145\x74\164e\x78t(\"{$button['text']}\");\x70h\x70b\141y_\x73\141\x66\145\143l\151\143\153(\x65);});\n"; break; case 'js': echo "\160\150\x70bay_\141d\x64Ev\x65\x6et(\x6eewb\164n, '\x63\154\x69ck', f\x75\x6e\x63\164\151o\156(e) {" . $button['js'] . "\160\x68\x70\x62\x61\171_s\141f\145\x63l\151\x63\153(e);});\n"; break; case 'ajax': echo "\160h\x70\142\141\171_\141\144\x64\x45\x76\145n\x74(\x6eew\x62t\156, '\143\154\x69ck', \146\x75\156\143t\151\x6f\x6e(e) {\x70\150\x70\x62\x61\x79_\x61j\141\170(\"{$button['hook']}\");\160\150p\142a\x79_\x73a\146\145\143\154\x69\143k(\x65);});\n"; break; default: echo "\x70\150\x70\142\x61\x79_\141dd\105ven\164(\156\x65\x77\x62\164\x6e, '\143\154i\x63\x6b', \146\165\x6e\143ti\157\x6e(e) {\x61l\x65\x72t(\"\124\x68\145 :{$button->type}: button i\x73 \x61n i\156\x76\x61\x6cid t\171p\x65\");p\150pba\x79_\163\141f\145\x63\154i\x63k(\x65);});\n"; } } } echo <<< MORESCRIPT
     Bu\x74\x74on\163Adde\144 += 1;  
   }
	}
	\143\141\x74\143\150(e) {
		set\x54ime\157\165t('ph\x70\142a\171_\141\x64\x64\142\165\164\x74\157n\163()', 5000);
	}
	//\x61\154\x65r\164('\150e\x72\145');
}
</\163cr\x69\x70\x74>

MORESCRIPT;
} function zfD4egYh7($oGq24gO8N, $agF2gTdKE, $KMf27gmaG, $qttext, $type="\x61\x6e\x79") { if ($qttext == '') $qttext = $agF2gTdKE; $this->CMX9gYotI[$type][] = array('type'=>'text', 'src'=>$oGq24gO8N, 'alt'=>$agF2gTdKE, 'text'=>$KMf27gmaG, 'qttext'=>$qttext); return $this->CMX9gYotI; } function Rlg29gK4B($oGq24gO8N, $agF2gTdKE, $js, $qttext, $type="an\171") { if ($qttext == '') $qttext = 'Testing'; 
$this->CMX9gYotI[$type][] = array('type'=>'js', 'src'=>$oGq24gO8N, 'alt'=>$agF2gTdKE, 'js'=>$js, 'qttext'=>$qttext); return $this->CMX9gYotI; } function KGn1g4iOB($oGq24gO8N, $agF2gTdKE, $hook, $qttext, $type="a\156\x79") { if ($qttext == '') $qttext = $agF2gTdKE; $this->CMX9gYotI[$type][] = array('type'=>'ajax', 'src'=>$oGq24gO8N, 'alt'=>$agF2gTdKE, 'hook'=>$hook, 'qttext'=>$qttext); return $this->CMX9gYotI; } function separator($type="a\x6ey") { $this->CMX9gYotI[$type][] = array('type'=>'separator'); return $this->CMX9gYotI; } function cEF48gFDY($HgM2fgaUK, $OdO10gEiB) { $this->kVf30gIUo[$HgM2fgaUK] = $OdO10gEiB; } function basename($src='') { if($src == '') $src = __FILE__; $qGk32gkYq = preg_replace('/^.*wp-content[\\\\\/]plugins[\\\\\/]/', '', $src); return str_replace('\\', '/', $qGk32gkYq); } function AjF45gcBM($src = '') { return get_settings('siteurl') . '/wp-content/plugins/' . $this->basename($src); } function AKM25gA6G($filename) { $FNGbgKPZ3=0; while(!is_file($filename)) { $filename = '../' . $filename; $FNGbgKPZ3++; if($FNGbgKPZ3==30) { echo 'Could not find ' . basename($filename) . '.'; return ''; } } return $filename; } function zZL12gCfO($bMB1bg2r3) { $fYZ4g87Nj = func_get_args(); echo "<\x70r\x65 \x73\x74\x79l\x65=\"b\141\x63k\147ro\x75\x6ed-\143o\154\157r:#\x66\x66\x65ee\145;bord\x65\x72:1\x70\x78 \163o\154\x69d \x72e\144;\">"; foreach($fYZ4g87Nj as $XnP3g6CaJ) { echo htmlentities(print_r($XnP3g6CaJ, 1)) . "<\142\x72/>"; } echo "</\x70r\145>"; } } $phpbay = new phpbay(); function eDa42ghLl($oGq24gO8N, $agF2gTdKE, $KMf27gmaG, $qttext="", $type="\141\x6ey") { global $phpbay; return $phpbay->zfD4egYh7($oGq24gO8N, $agF2gTdKE, $KMf27gmaG, $qttext, $type);} function bZH3bgEIm($oGq24gO8N, $agF2gTdKE, $js, $qttext="", $type="a\156y") { global $phpbay; return $phpbay->Rlg29gK4B($oGq24gO8N, $agF2gTdKE, $js, $qttext, $type);} function nPk37gsn6($oGq24gO8N, $agF2gTdKE, $hook, $qttext="", $type="a\156y") { global $phpbay; return $phpbay->KGn1g4iOB($oGq24gO8N, $agF2gTdKE, $hook, $qttext, $type);} function LKk3fgOpP($type="\x61n\x79") { global $phpbay; return $phpbay->separator($type);} function BNd44gS7o($oGq24gO8N, $agF2gTdKE, $qttext="", $KMf27gmaG) { global $phpbay; return $phpbay->zfD4egYh7($oGq24gO8N, $agF2gTdKE, $KMf27gmaG, $qttext, 'post');} function Tgl3dgYTO($oGq24gO8N, $agF2gTdKE, $qttext="", $js) { global $phpbay; return $phpbay->Rlg29gK4B($oGq24gO8N, $agF2gTdKE, $js, $qttext, 'post');} function zzP39gi0Z($oGq24gO8N, $agF2gTdKE, $qttext="", $hook) { global $phpbay; return $phpbay->KGn1g4iOB($oGq24gO8N, $agF2gTdKE, $hook, $qttext, 'post');} function URD41gkDq() { global $phpbay; return $phpbay->separator('post');} function sNz43gE54($oGq24gO8N, $agF2gTdKE, $qttext="", $KMf27gmaG) { global $phpbay; return $phpbay->zfD4egYh7($oGq24gO8N, $agF2gTdKE, $KMf27gmaG, $qttext, 'page');} function MIG3cgrYi($oGq24gO8N, $agF2gTdKE, $qttext="", $js) { global $phpbay; return $phpbay->Rlg29gK4B($oGq24gO8N, $agF2gTdKE, $js, $qttext, 'page');} function COV38gesi($oGq24gO8N, $agF2gTdKE, $qttext="", $hook) { global $phpbay; return $phpbay->KGn1g4iOB($oGq24gO8N, $agF2gTdKE, $hook, $qttext, 'page');} function SZP40gkZJ() { global $phpbay; return $phpbay->separator('page');} function nob3agmdG($src = '') {global $phpbay; return dirname($phpbay->AjF45gcBM($src));} function XTh3egrXc($HgM2fgaUK, $OdO10gEiB) {global $phpbay; return $phpbay->cEF48gFDY($HgM2fgaUK, $OdO10gEiB);}   function Modify_SwitchEditors_Action() { echo "\n". <<<EOT
<\x73\143\162\x69p\164 \x74\171\x70\145="text/\152\x61\166\x61\x73\143\x72\x69\x70t">
<!--
	\151f(\145d\x42ut\x74\157\156\x73\x44\x69\x76 = d\x6fc\x75me\156\164.\147\145t\x45\154\x65\x6d\145\x6e\x74\x42\171\x49d("\x65\x64\102\165\x74\164\157\156\163")){
	   \x76\141\162 \x44\151\166\110T\x4d\114 = \x65\x64B\165\164\x74on\x73D\x69\166.\x69\156n\x65\162\110\x54\115\114
     D\x69\166\110\x54\115\x4c = \x44\151v\110\x54M\114.r\145p\x6c\x61c\x65(/s\x77\x69\164ch\105d\x69\x74o\162\x73\("\x63on\x74e\x6e\164"\)/\x67, "\x52\145\x76\x69s\145\144\123w\151\x74ch\x45d\x69to\162\x73(\"\143o\156t\x65\156t\")");
     e\x64\102\165t\x74\x6f\156s\x44\x69\166.i\x6e\156erH\124M\x4c = \104\x69\166\x48T\115\114;
	}
	
\x66\x75\x6e\x63\x74\151\157\x6e \x52\145\166\x69s\145dS\x77\x69\x74\x63\x68\105\144\151to\x72s(\151\x64) {
  s\167\151t\143h\x45\x64\x69t\x6f\x72s(\151\x64);
  \x6d\143eB\165t\164o\156s\101\x64d\145d = 0;
  p\150p\x62\x61y_a\x64\144\142u\164t\157\x6es();	
  \x72\145\x74\165\x72\156;
}  
//-->
</scr\x69\160t>
EOT;
return; } endif; if (!defined('ABSPATH')) { require_once($phpbay->AKM25gA6G('wp-config.php')); $phpbay->eSn1fg4kZ(); } else { $phpbay->pJK4bgj3P(); } ?>