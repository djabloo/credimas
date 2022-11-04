<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;



class ContactController extends FrontendController
{

    /**
    * @Template
    * @param Request $request
    * @return array
    */

public function indexAction(Request $request)
    {

        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $formData = $form->getData();

                try {
                    $mail = new \Pimcore\Mail();
                    $mail->from($formData['email']);
                    $mail->to('djabloo@gmail.com');
                    $mail->setDocument('/emails/contact-us');
                    $mail->setParams($formData);
                    $mail->send();

                }catch (\Throwable $e) {
                    return $this->redirect('/Contact');
                }

                return $this->redirect('/Contact');
            }
        }

        return [
            'form' => $form->createView()
        ];
    }

    /**
     * @Template
     * @param Request $request
     * @return Response
     */
    public function contactMailAction(Request $request)
    {
        $attributes = $request->attributes->all();

        return  $this->render('emails/contact.html.twig', $attributes);
    }



}


