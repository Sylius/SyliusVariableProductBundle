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
 * Sylius\Bundle\VariableProductBundle\Model\Dependency
 *
 * @author Ivan Molchanov <ivan.molchanov@opensoftdev.ru>
 */
class Dependency implements DependencyInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var OptionValueInterface
     */
    protected $optionValue;

    /**
     * @var OptionInterface
     */
    protected $option;

    /**
     * @var VariableProductInterface
     */
    protected $product;

    /**
     * @param int $id
     * @return Dependency
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setOption($option)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * {@inheritdoc}
     */
    public function setOptionValue($optionValue)
    {
        $this->optionValue = $optionValue;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * {@inheritdoc}
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProduct()
    {
        return $this->product;
    }

}
