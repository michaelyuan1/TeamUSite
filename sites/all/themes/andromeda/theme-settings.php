<?php

/**
* Implementation of THEMEHOOK_settings() function.
*
* @param $saved_settings
*   array An array of saved settings for this theme.
* @return
*   array A form array.
*/
function andromeda_form_system_theme_settings_alter(&$form, $form_state) {
  
  $form['andromeda_settings_title'] = array(
    '#markup' => t('Andromeda Settings'),
  );
  
  $form['andromeda_theme_settings'] = array(
    '#type' => 'vertical_tabs',
    '#title' => t('Andromeda Theme Settings'),
  );
  
  $form['andromeda_logo_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Logo'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'andromeda_theme_settings',
  );
  
  $form['andromeda_logo_settings']['andromeda_logo_position'] = array(
    '#type' => 'radios',
    '#title' => t('Position of logo'),
    '#options' => array(
      'left' => t('Left'),
      'right' => t('Right'),
    ),
    '#default_value' => (theme_get_setting('andromeda_logo_position')) ? theme_get_setting('andromeda_logo_position') : 'left',
  );
  
  $form['andromeda_sidebar_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Sidebar Visibility'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'andromeda_theme_settings',
  );
  
  $form['andromeda_sidebar_settings']['andromeda_sidebar_visibility'] = array(
    '#type' => 'textarea',
    '#title' => t('Sidebar visibilty (Do not show the sidebar on the following pages)'),
    '#description' => t('Enter the path for pages you do not want to show the sidebar. Enter one path per line. The \'*\' character is a wildcard. Example paths are blog for the blog page and blog/* for every personal blog. &lt;front&gt; is the front page. '),
    '#attributes' => array(
      'cols' => '25',
    ),
    '#default_value' => theme_get_setting('andromeda_sidebar_visibility'),
  );
  
  $form['andromeda_theme_options'] = array(
    '#type' => 'fieldset',
    '#title' => t('Other'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'andromeda_theme_settings',
  );
  
  $form['andromeda_theme_options']['andromeda_show_front_page_title'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show page title on front page'),
    '#default_value' => theme_get_setting('andromeda_show_front_page_title'),
  );
  
  if (module_exists('follow')) {
    $form['andromeda_theme_options']['andromeda_show_follow_links'] = array(
      '#type' => 'checkbox',
      '#title' => t('Show follow links in search block'),
      '#default_value' => theme_get_setting('andromeda_show_follow_links'),
    );
  }

  // Return the additional form widgets
  return $form;
}