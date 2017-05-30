<?php

namespace Drupal\ad_general\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HtmlCommand;


/**
 * Implements an example form.
 */
class Form extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'send_email_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#required' => TRUE,
    );
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name'),
    );
    $form['email'] = array(
      '#type' => 'textfield',
      '#title' => t('Email'),
      '#required' => TRUE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Send'),
      '#prefix' => '<div id="user-email-result"></div>',
      '#ajax' => array(
        'callback' => 'ad_general_send_mail',
      ),    
    );
    return $form;
  }
  /*function ad_general_form_alter(&$form, &$form_state, $form_id){
    var_dump($form_id);
  }*/

  /**
   * {@inheritdoc}
   */
  /*public function ad_general_validate_email(array &$form, FormStateInterface $form_state) {
    /*
    if (!valid_email_address($form_state['values']['email'])) {
      $form_state->setErrorByName('email', t('Please enter a valid response email!'));
    }
  }*/

function checkUserEmailValidation(array $form, FormStateInterface $form_state) {
    $ajax_response = new AjaxResponse();
    $text = 'User or Email is exists';
    $ajax_response->addCommand(new HtmlCommand('#user-email-result', $text));
    return $ajax_response;
   }

  /**
   * {@inheritdoc}
   */
function submitForm(array &$form, FormStateInterface $form_state) {
    //
  }

}