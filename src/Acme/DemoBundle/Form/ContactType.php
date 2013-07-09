<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\SecurityContext;
use Acme\DemoBundle\Entity\ContactRepository;

class ContactType extends AbstractType
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $this->user;
        $builder
            ->add('email', 'email')
            ->add('fullName')
            ->add('address')
            ->add('contactGroups' , 'entity', array(
                'class' => 'AcmeDemoBundle:ContactGroup',
                'query_builder' => function(EntityRepository $er) use ($user) {
                    return $er->createQueryBuilder('qb')
                        ->select('cg')
                        ->from('AcmeDemoBundle:ContactGroup', 'cg')
                        ->where('cg.missionary = :missionary')
                        ->setParameters(array(
                            'missionary' => $user
                        ));
                },
            ))
//            ->add('contactGroups' , 'entity', array(
//                'class' => 'AcmeDemoBundle:ContactGroup',
//                'query_builder' => function(ContactRepository $er) use ($user) {
//                    return $er->getContactGroupsByContact($user);
//                },
//            ))
        ;
    }

    public function getName()
    {
        return 'contact';
    }
}
