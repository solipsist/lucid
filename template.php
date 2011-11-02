<?php

/**
 * Change the default meta content-type tag to the shorter HTML5 version.
 */
function lucid_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Changes the search form to use the HTML5 "search" input attribute.
 */
function lucid_preprocess_search_block_form(&$vars) {
  $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}

/**
 * Process variables for the html tag.
 */
function lucid_process_html_tag(&$vars) {
  $tag = &$vars['element'];
  if ($tag['#tag'] == 'style' || $tag['#tag'] == 'script') {
    // Remove redundant type attribute and CDATA comments.
    unset($tag['#attributes']['type'], $tag['#value_prefix'], $tag['#value_suffix']);

    // Remove media="all" but leave others unaffected.
    if (isset($tag['#attributes']['media']) && $tag['#attributes']['media'] === 'all') {
      unset($tag['#attributes']['media']);
    }
  }
}

/**
 * Uses RDFa attributes if the RDF module is enabled.
 * Lifted from Adaptivetheme for D7, full credit to Jeff Burnz.
 * ref: http://drupal.org/node/887600
 */
function lucid_preprocess_html(&$vars) {
  global $language;
  
  $vars['base_path'] = base_path();
  $vars['path_to_theme'] = drupal_get_path('theme', 'lucid');

  if (module_exists('rdf')) {
    $vars['doctype'] = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN">' . "\n";
    $vars['rdf']->version = 'version="HTML+RDFa 1.1"';
    $vars['rdf']->namespaces = $vars['rdf_namespaces'];
    $vars['rdf']->profile = ' profile="' . $vars['grddl_profile'] . '"';
  } else {
    $vars['doctype'] = '<!DOCTYPE html>' . "\n";
    $vars['rdf']->version = '';
    $vars['rdf']->namespaces = '';
    $vars['rdf']->profile = '';
  }

  // Attributes for html element.
  $vars['html_attributes'] = 'lang="' . $language->language . '" dir="' . $language->dir . '"';
}

/**
 * Duplicate of theme_menu_local_tasks().
 */
function lucid_menu_local_tasks($vars) {
  $output = '';
  
  if ($primary = drupal_render($vars['primary'])) {
    $output .= '<ul class="tabs primary clearfix">' . $primary . '</ul>';
  }
  if ($secondary = drupal_render($vars['secondary'])) {
    $output .= '<ul class="tabs secondary clearfix">' . $secondary . '</ul>';
  }
  
  return $output;
}
  
/**
 * Modify the Panels default output to remove the panel separator.
 */
function lucid_panels_default_style_render_region($vars) {
  $output = '';
  $output .= implode($vars['panes']);
  return $output;
}

/**
 * Override of panels_pane().
 */
function lucid_preprocess_panels_pane(&$vars, $hook) {
  $panel = $vars['pane']->panel;
  $count = count($vars['display']->panels[$panel]);

  // Add count classes to panes.
  //$vars['classes_array'][] = 'count-' . ($vars['pane']->position + 1); 

  // Add first and last classes to panes.
  if ($vars['pane']->position == 0) {
    $vars['classes_array'][] = 'first';
  }

  if ($vars['pane']->position == $count - 1) {
    $vars['classes_array'][] = 'last';
  }
}

/**
 * Process variables for pane messages.
 */
function lucid_preprocess_pane_messages(&$vars) {
  $vars['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => drupal_get_breadcrumb()));
  $vars['title'] = drupal_get_title();
  $vars['tabs'] = menu_local_tabs();
  $vars['help'] = theme('help');
  $vars['action_links'] = menu_local_actions();
}


/**
 * Return a themed breadcrumb trail.
 */
function lucid_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= '<nav class="breadcrumb" role="navigation">' . implode(' » ', $breadcrumb) . '</nav>';
    return $output;
  }
}

/**
 * Override of theme_menu_tree().
 */
function lucid_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Modify the output of theme_field to support HTML5.
 */
function lucid_field($vars) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$vars['label_hidden']) {
    $output .= '<h5 class="field-label"' . $vars['title_attributes'] . '>' . $vars['label'] . '</h5>';
  }

  // Render the items.
  foreach ($vars['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $vars['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }

  // Render the top-level wrapper element.
  $tag = $vars['label_hidden'] ? 'section' : 'div';
  $output = "<$tag class=\"" . $vars['classes'] . '"' . $vars['attributes'] . '>' . $output . "</$tag>";

  return $output;
}
