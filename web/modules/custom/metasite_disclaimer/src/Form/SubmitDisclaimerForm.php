<?php

namespace Drupal\metasite_disclaimer\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use \GuzzleHttp\Cookie\SetCookie;

/**
 * Class SubmitDisclaimerForm.
 */
class SubmitDisclaimerForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'submit_disclaimer_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $nid = null) {
    if ($nid) {
      $form['nid'] = [
        '#type' => 'hidden',
        '#value' => $nid,
      ];

      $form['submit'] = [
        '#type' => 'submit',
        '#value' => $this->t('Yes'),
      ];

      $form['decline'] = [
        '#title' => $this->t('No'),
        '#type' => 'link',
        '#url' => Url::fromRoute('<front>'),
      ];

      return $form;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $nid = $form_state->getValue('nid');

    user_cookie_save(['metasite_disclaimer_accecpted_nid_'.$nid => 'true']);
  }

}
