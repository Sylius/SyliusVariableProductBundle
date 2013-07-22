<?php
/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\VariableProductBundle\Model;

/**
 * Sylius\Bundle\VariableProductBundle\Model\DependencyInterface
 *
 * @author Ivan Molchanov <ivan.molchanov@opensoftdev.ru>
 */
interface DependencyInterface 
{
    /**
     * @param int $id
     * @return Dependency
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param OptionInterface $option
     * @return Dependency
     */
    public function setOption($option);

    /**
     * @return OptionInterface
     */
    public function getOption();

    /**
     * @param OptionValueInterface $optionValue
     * @return Dependency
     */
    public function setOptionValue($optionValue);

    /**
     * @return OptionValueInterface
     */
    public function getOptionValue();

    /**
     * @param VariableProductInterface $product
     * @return Dependency
     */
    public function setProduct($product);

    /**
     * @return VariableProductInterface
     */
    public function getProduct();
}
