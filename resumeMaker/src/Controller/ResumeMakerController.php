<?php

namespace Drupal\resumeMaker\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\resumeMaker\Form\ResumeMakerForm;

class ResumeMakerController extends ControllerBase
{

  public function resumeMaker()
  {

    $form = \Drupal::formBuilder()->getForm(resumeMakerForm::class);

    return [
      '#theme' => 'resumemaker',
      '#title' => 'Resume Maker',
      '#form' => $form,
    ];
  }

}

?>