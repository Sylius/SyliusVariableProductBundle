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
 * Sylius\Bundle\VariableProductBundle\Model\ConflictInterface
 *
 * @author Ivan Molchanov <ivan.molchanov@opensoftdev.ru>
 */
interface ConflictInterface 
{
    /**
     * @param int $id
     * @return Conflict
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param VariableProductInterface $product
     * @return Conflict
     */
    public function setProduct($product);

    /**
     * @return VariableProductInterface
     */
    public function getProduct();

    /**
     * @param OptionValueInterface $source
     * @return Conflict
     */
    public function setSource($source);

    /**
     * @return OptionValueInterface
     */
    public function getSource();

    /**
     * @param OptionValueInterface $target
     * @return Conflict
     */
    public function setTarget($target);

    /**
     * @return OptionValueInterface
     */
    public function getTarget();
}
