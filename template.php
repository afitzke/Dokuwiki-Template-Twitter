<?php
function amdy_tpl_link_as_li($url, $name, $more = '', $return = false) {
    $out = '<li><a href="' . $url . '" ';
    if ($more)
        $out .= ' ' . $more;
    $out .= ">$name</a></li>";
    if ($return)
        return $out;
    print $out;
    return true;
}
function amdy_tpl_breadcrumbs() {
    global $lang;
    global $conf;

    //check if enabled
    if (!$conf['breadcrumbs'])
        return false;

    $crumbs = breadcrumbs(); //setup crumb trace
    //render crumbs, highlight the last one
    print '<ul class="breadcrumb">';
    $last = count($crumbs);
    $i = 0;
    foreach ($crumbs as $id => $name) {
        $i++;
        echo '<li' . ($i == $last ? ' class="active"' : '') . '>';
        //echo '<a href="test.php">test</a>';
        echo ('<a href="' . wl($id) . '" title="' . $id . '"' . '>' . hsc($name) . '</a>');
        if ($i != $last) {
            echo '<span class="divider">/</span>';
        }
        echo '</li>';
    }
    print '</ul>';
    return true;
}
/**
 * Print the search form
 *
 * If the first parameter is given a div with the ID 'qsearch_out' will
 * be added which instructs the ajax pagequicksearch to kick in and place
 * its output into this div. The second parameter controls the propritary
 * attribute autocomplete. If set to false this attribute will be set with an
 * value of "off" to instruct the browser to disable it's own built in
 * autocompletion feature (MSIE and Firefox)
 *
 */
function amdy_tpl_searchform($ajax=true,$autocomplete=true){
    global $lang;
    global $ACT;
    global $QUERY;

    // don't print the search form if search action has been disabled
    if (!actionOk('search')) return false;

    print '<form action="'.wl().'" accept-charset="utf-8" class="search" id="dw__search" method="get"><div class="no">';
    print '<input type="hidden" name="do" value="search" />';
    print '<input type="text" ';
    if($ACT == 'search') print 'value="'.htmlspecialchars($QUERY).'" ';
    if(!$autocomplete) print 'autocomplete="off" ';
    print 'id="qsearch__in" accesskey="f" name="id" class="edit" title="[F]" />';
    print '<input type="submit" value="'.$lang['btn_search'].'" class="button" title="'.$lang['btn_search'].'" />';
    if($ajax) print '<div id="qsearch__out" class="ajax_qsearch JSpopup"></div>';
    print '</div></form>';
    return true;
}

/**
* Like the action buttons but links
*
* @author Adrian Lang <mail@adrianlang.de>
* @see    tpl_get_action
*/
function btstrp_dropdown_tpl_actionlink($type,$class='',$pre='',$suf='',$inner='',$return=false){
  global $lang;
  $data = tpl_get_action($type);
  if ($data === false) {
	  return false;
  } elseif (!is_array($data)) {
	  $out = sprintf($data, 'link');
  } else {
	  extract($data);
	  if (strpos($id, '#') === 0) {
		  $linktarget = $id;
	  } else {
		  $linktarget = wl($id, $params);
	  }
	  $caption = $lang['btn_' . $type];
	  $akey = $addTitle = '';
	  if($accesskey){
		  $akey = 'accesskey="'.$accesskey.'" ';
		  $addTitle = ' ['.strtoupper($accesskey).']';
	  }
	  $out = tpl_link($linktarget, $pre.(($inner)?$inner:$caption).$suf,
					  'class="action ' . $type .' '.$class.'" ' .
					  $akey . 'rel="nofollow" ' .
					  'title="' . hsc($caption).$addTitle . '"', 1);
	  $out='<a class="btn dropdown-toggle action ' . $type .' '.$class.'" data-toggle="dropdown" href="#">
									'.$pre.(($inner)?$inner:$caption).$suf.'
									<span class="caret"></span>
									</a>';
  }
  if ($return) return $out;
  echo $out;
  return true;
}

/**
* Like the action buttons but links
*
* @author Adrian Lang <mail@adrianlang.de>
* @see    tpl_get_action
*/
function btstrp_action_link($type,$class='',$pre='',$suf='',$inner='',$return=false){
  global $lang;
  $data = tpl_get_action($type);
  if ($data === false) {
	  return false;
  } elseif (!is_array($data)) {
	  $out = sprintf($data, 'link');
  } else {
	  extract($data);
	  if (strpos($id, '#') === 0) {
		  $linktarget = $id;
	  } else {
		  $linktarget = wl($id, $params);
	  }
	  $caption = $lang['btn_' . $type];
	  $akey = $addTitle = '';
	  if($accesskey){
		  $akey = 'accesskey="'.$accesskey.'" ';
		  $addTitle = ' ['.strtoupper($accesskey).']';
	  }
	  $out = tpl_link($linktarget, $pre.(($inner)?$inner:$caption).$suf,
					  'class="action ' . $type .' '.$class.'" ' .
					  $akey . 'rel="nofollow" ' .
					  'title="' . hsc($caption).$addTitle . '"', 1);
  }
  if ($return) return $out;
  echo $out;
  return true;
}
?>
