<?php

namespace App\Form;

use App\Entity\TrainingCentersRequisites;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraningCenterRequisitesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'old_id',
                IntegerType::class,
                [
                    'label' => 'Старый ID',
                ]
            )
            ->add(
                'dateAded',
                DateTimeType::class,
                [
                    'label' => 'Дата изменения',
                ]
            )
            ->add(
                'name',
                TextareaType::class,
                [
                    'label' => 'Название полное',
                ]
            )
            ->add(
                'short_name',
                TextType::class,
                [
                    'label' => 'Сокращенное название',
                ]
            )
            ->add(
                'city',
                TextType::class,
                [
                    'label' => 'Город',
                ]
            )
            ->add(
                'address_your',
                TextareaType::class,
                [
                    'label' => 'Юридический адрес',
                ]
            )
            ->add(
                'address_fact',
                TextType::class,
                [
                    'label' => 'Фактический адрес',
                ]
            )
            ->add(
                'director',
                TextType::class,
                [
                    'label' => 'ФИО руководителя',
                ]
            )
            ->add(
                'about_director',
                TextType::class,
                [
                    'label' => 'Должность руководителя',
                ]
            );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TrainingCentersRequisites::class,
        ]);
    }
}
