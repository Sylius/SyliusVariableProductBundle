<?php
/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\VariableProductBundle\Generator;

use Sylius\Bundle\VariableProductBundle\Model\VariableProductInterface;

/**
 * Sylius\Bundle\VariableProductBundle\Generator\ResolverInterface
 *
 * @author Ivan Molchanov <ivan.molchanov@opensoftdev.ru>
 */
interface ResolverInterface
{
    /**
     * @param array $permutations
     * @param array $optionMap
     * @param VariableProductInterface $product
     * @return mixed
     */
    public function resolve(array $permutations, array $optionMap, VariableProductInterface $product);
}
