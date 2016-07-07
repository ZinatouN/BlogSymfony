<?php

namespace blog\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticleType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('titre', 'text')
                ->add('description', 'textarea')
                ->add('file', FileType::class)
                ->add('Ajouter', SubmitType::class);
    }

    public function getName() {
        return 'blog_ArticleBundle_articletype';
    }

}
