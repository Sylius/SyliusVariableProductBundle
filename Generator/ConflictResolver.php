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
 * Sylius\Bundle\VariableProductBundle\Generator\ConflictsResolver
 *
 * @author Ivan Molchanov <ivan.molchanov@opensoftdev.ru>
 */
class ConflictResolver implements ResolverInterface
{

    /**
     * {@inheritdoc}
     */
    public function resolve(array $permutations, array $optionMap, VariableProductInterface $product)
    {
        $result = array();
        foreach ($permutations as $permutation) {
            foreach ($permutation as $id) {
                /** @var \Sylius\Bundle\VariableProductBundle\Model\OptionValueInterface $optionValue */
                $optionValue = $optionMap[$id];
                /** @var \Sylius\Bundle\VariableProductBundle\Model\ConflictInterface $conflict */
                foreach ($optionValue->getConflictedValues() as $conflict) {
                    if ($conflict->getProduct() === $product) {
                        if (in_array($conflict->getTarget()->getId(), $permutation)) {
                            continue 3;
                        }
                    }
                }

            }
            $result[] = $permutation;
        }

        return $result;
    }
}
