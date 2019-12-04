<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Form\ResetPasswordType;
use App\Form\ResetInfoType;
use App\Form\ResetEmailType;
use App\Entity\Contact;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class SecurityController extends AbstractController
{

    private $encoder;
    private $manager;

    public function __construct(UserPasswordEncoderInterface $encoder, ObjectManager $manager){
        $this->encoder = $encoder;
        $this->manager = $manager;
    }

    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registratoin(Request $request){

    	$user = new User();
    	$form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){

            $hash = $this->encoder->encodePassword($user, $user->getPassword());

            $user->setRoles(['ROLE_USER']);
            $user->setUsername($user->getEmail());
            $user->setPassword($hash);

            $this->manager->persist($user);
            $this->manager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('security/registration.html.twig', [
        	'registerForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(){
        
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout(){}

    /**
     * @Route("/account/profile", name="security_account", methods={"GET", "POST"})
     */
    public function account(Request $request){

        $user = new User();

        $formPassword = $this->createForm(ResetPasswordType::class, $user);
        $formEmail = $this->createForm(ResetEmailType::class, $user);
        $formInfo = $this->createForm(ResetInfoType::class, $user);

        $this->resetPassword($request, $formPassword, $user);
        $this->resetInfo($request, $formInfo, $user);
        $this->resetEmail($request, $formEmail, $user);

        $menuTitle = "Mes informations personnelles";
        $account = 'current';

        return $this->render('security/profile.html.twig', [
            'menuTitle' => $menuTitle,
            'account' => $account,
            'user' => $user,
            'formPassword' => $formPassword->createView(),
            'formEmail' => $formEmail->createView(),
            'formInfo' => $formInfo->createView(),
        ]);
    }
    
    /**
     * @Route("/account/conseil", name="security_conseil")
     */
    public function conseil(){

        $menuTitle = "conseils vision";
        $conseil = 'current';

        return $this->render('security/conseil.html.twig', [
            'menuTitle' => $menuTitle,
            'conseil' => $conseil
        ]);
    }

    /**
     * @Route("/account/mail", name="security_mail")
     *
     * Require ROLE_ADMIN for only this controller method.
     *
     * @IsGranted("ROLE_ADMIN")
     */
    public function mail(){

        $messages = $this->getDoctrine()
                    ->getRepository(Contact::class)
                    ->findAll();

        $menuTitle = "Email";
        $mail = 'current';

        return $this->render('security/mailing.html.twig', [
            'menuTitle' => $menuTitle,
            'mail' => $mail,
            'messages' => $messages
        ]);
    }

    private function resetPassword($request, $form, $user){

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){

            $newHash = $this->encoder->encodePassword($user, $user->getPlainPassword());

            $user = $this->getDoctrine()
                         ->getRepository(User::class)
                         ->find($this->getUser()->getId());

            $user->setPassword($newHash);

            $this->manager->persist($user);
            $this->manager->flush();
        }
    }

    private function resetInfo($request, $form, $user){

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){

            $civility = $user->getCivility();
            $lastname = $user->getLastname();
            $firtname = $user->getFirstname();
            $tel = $user->getTel();
            $birthday = $user->getBirthday();

            $user = $this->getDoctrine()
                         ->getRepository(User::class)
                         ->find($this->getUser()->getId());

            $user->setCivility($civility);
            $user->setLastname($lastname);
            $user->setFirstname($firtname);
            $user->setTel($tel);
            $user->setBirthday($birthday);

            $this->manager->persist($user);
            $this->manager->flush();
        }
    }

    private function resetEmail($request, $form, $user){

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){

            $email = $user->getEmail();

            $user = $this->getDoctrine()
                         ->getRepository(User::class)
                         ->find($this->getUser()->getId());

            $user->setEmail($email);
            $user->setUsername($email);

            $this->manager->persist($user);
            $this->manager->flush();
        }
    }
}
