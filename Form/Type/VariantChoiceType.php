<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\VariableProductBundle\Form\Type;

use Sylius\Bundle\VariableProductBundle\Form\ChoiceList\VariantChoiceList;
use Sylius\Bundle\VariableProductBundle\Model\ProductInterface;
use Symfony\Bridge\Doctrine\Form\DataTransformer\CollectionToArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Exception\FormException;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Variant choice form type.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class VariantChoiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (!isset($options['product']) || !$options['product'] instanceof ProductInterface) {
            throw new FormException('You have to pass "Sylius\Bundle\VariableProductBundle\Model\ProductInterface" as "product" option to variant choice type');
        }

        if ($options['multiple']) {
            $builder->prependClientTransformer(new CollectionToArrayTransformer());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $choiceList = function (Options $options) {
            return new VariantChoiceList($options['product'], $options['availables']);
        };

        $resolver
            ->setDefaults(array(
                'product'     => null,
                'multiple'    => false,
                'expanded'    => true,
                'availables'  => true,
                'choice_list' => $choiceList
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'choice';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_variant_choice';
    }
}
