<?php
/**
 * This file is part of ONP.
 *
 * Copyright (c) 2013 Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace Sylius\Bundle\VariableProductBundle\Generator;

use Sylius\Bundle\VariableProductBundle\Model\VariableProductInterface;

/**
 * Sylius\Bundle\VariableProductBundle\Generator\DependencyResolver
 *
 * @author Ivan Molchanov <ivan.molchanov@opensoftdev.ru>
 */
class DependencyResolver implements ResolverInterface
{
    public function resolve(array $permutations, array $optionMap, VariableProductInterface $product)
    {
        $result = array();
        foreach ($permutations as $permutation) {
            foreach ($permutation as $id) {
                /** @var \Sylius\Bundle\VariableProductBundle\Model\OptionValueInterface $optionValue */
                $optionValue = $optionMap[$id];
                /** @var \Sylius\Bundle\VariableProductBundle\Model\OptionValueInterface $value */
                foreach ($optionValue->getOption()->getValues() as $value) {
                    if ($value !== $optionValue) {
                        foreach ($value->getDependencies() as $dependency) {
                            if ($dependency->getProduct() === $product) {
                                $dependentOption = $dependency->getOption();
                                foreach ($dependentOption->getValues() as $dependentOptionValue) {
                                    $permutation = array_diff($permutation, array($dependentOptionValue->getId()));
                                }
                            }
                        }
                    }
                }


            }
            $result[] = $permutation;
        }

        return array_unique($result, SORT_REGULAR);
    }
}
