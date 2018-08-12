<?php
/*function photosok_menu_tree__main_menu(&$variables) {
  return '<div class="menu_main__links"><ul>' . $variables['tree'] . '</ul></div>';
}*/

function tihiy_preprocess_page(&$vars, $hook) {
    if (isset($vars['node'])) { 
        $vars['theme_hook_suggestions'][] = 'page__'. str_replace('_', '--', $vars['node']->type);
    }
}

function modul_my_render($data, $is_admin = false){
	if($is_admin === true){
		$view = '<a class="edit_node_block" href="#overlay=admin/structure/block/manage/block/'.$data['bid'].'/configure" title="Редактировать"></a>';
		$view .= $data['body'];
		return $view;
	} else {
		return $data['body'];
	}
}

function print_arr($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function tihiy_menu_tree__main_menu(&$variables) {
  return '<nav class="menu_before">' . $variables['tree'] . '</nav>';
}

function tihiy_menu_link(array $variables) {
  $element = $variables['element'];
  $is_active = array();

  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    //$element['#attributes']['class'] = array('active');
    //$element['#localized_options']['class'] = array('active');
    $is_active[] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $is_active);
  return $output;
}

function rus_date($date){
	$month = array(
		'01' => 'Января',
		'02' => 'Февраля',
		'03' => 'Марта',
		'04' => 'Апреля',
		'05' => 'Мая',
		'06' => 'Июня',
		'07' => 'Июля',
		'08' => 'Августа',
		'09' => 'Сентября',
		'10' => 'Октября',
		'11' => 'Ноября',
		'12' => 'Декабря',
	);

	return date('d', $date).' '.$month[date('m', $date)].' '.date('Y', $date);
}

function cutStr($str, $length = 200, $postfix='...'){
    if ( strlen($str) <= $length)
        return $str;
     
    $temp = substr($str, 0, $length);
    return substr($temp, 0, strrpos($temp, ' ') ) . $postfix;
}

function markup_rm($value){
  $markup_rm = array('Читать новость','Смотреть','Читать статью','Читать полностью');
  return $markup_rm[$value];
}

/*function tihiy_form_alter(&$form, &$form_state, $form_id){
  return $form['op']['#attributes'] = array('onclick' => 'mask_click();');
}*/