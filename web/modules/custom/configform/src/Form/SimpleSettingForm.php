<?php
namespace Drupal\configform\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
* Configure example settings for this site.
*/
class SimpleSettingForm extends ConfigFormBase {

//  const SETTINGS = 'configform.settings';

 /**
  * {@inheritdoc}
  */
 public function getFormId() {
   return 'configform_admin.settings';
 }

 /**
  * {@inheritdoc}
  */
 protected function getEditableConfigNames() {
   return 'configform_admin';
 }

 /**
  * {@inheritdoc}
  */
 public function buildForm(array $form, FormStateInterface $form_state) {
   $config = $this->config('configform_admin.settings');

   $form['name'] = [
     '#type' => 'textfield',
     '#title' => $this->t('name'),
     '#default_value' => $config->get('name'),
   ];

   $form['addr'] = [
     '#type' => 'textfield',
     '#title' => $this->t('addr'),
     '#default_value' => $config->get('addr'),
   ];

   return parent::buildForm($form, $form_state);
 }

 /**
  * {@inheritdoc}
  */
 public function submitForm(array &$form, FormStateInterface $form_state) {
   $values = $form_state->getValues();
   $this->config('configform_admin.settings')
    ->set('name',$values['name'])
    ->set('addr',$values['addr'])
    ->save();
    return parent::submitForm($form, $form_state);
 }
}
