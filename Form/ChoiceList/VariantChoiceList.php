<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\VariableProductBundle\Form\ChoiceList;

use Sylius\Bundle\VariableProductBundle\Model\ProductInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;

/**
 * Product variant choice list.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class VariantChoiceList extends ObjectChoiceList
{
    /**
     * Constructor.
     *
     * @param ProductInterface $product
     * @param bool $onlyAvailable
     */
    public function __construct(ProductInterface $product, $onlyAvailable = true)
    {
        $variants = $onlyAvailable ? $product->getAvailableVariants() : $product->getVariants();

        parent::__construct($variants, 'sku', array(), null, 'id');
    }
}
