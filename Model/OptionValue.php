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

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Option value.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class OptionValue implements OptionValueInterface
{
    /**
     * Option value id.
     *
     * @var mixed
     */
    protected $id;

    /**
     * Value.
     *
     * @var string
     */
    protected $value;

    /**
     * Option.
     *
     * @var OptionInterface
     */
    protected $option;

    /**
     * @var ConflictInterface[]|ArrayCollection
     */
    protected $conflictedValues;

    /**
     * @var ConflictInterface[]|ArrayCollection
     */
    protected $conflictValues;

    /**
     * @var DependencyInterface[]|ArrayCollection
     */
    protected $dependencies;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->conflictedValues = new ArrayCollection();
        $this->conflictValues = new ArrayCollection();
        $this->dependencies = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        $this->value = $value;

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
    public function setOption(OptionInterface $option = null)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        if (null === $this->option) {
            throw new \BadMethodCallException('The option have not been created yet so you cannot access proxy methods.');
        }

        return $this->option->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function getPresentation()
    {
        if (null === $this->option) {
            throw new \BadMethodCallException('The option have not been created yet so you cannot access proxy methods.');
        }

        return $this->option->getPresentation();
    }

    /**
     * {@inheritdoc}
     */
    public function setConflictedValues($conflicts)
    {
        $this->conflictedValues = $conflicts;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getConflictedValues()
    {
        return $this->conflictedValues;
    }

    /**
     * {@inheritdoc}
     */
    public function addConflictedValue(ConflictInterface $conflict)
    {
        return $this->conflictedValues->add($conflict);
    }

    /**
     * {@inheritdoc}
     */
    public function removeConflictedValue(ConflictInterface $conflict)
    {
        return $this->conflictedValues->remove($conflict);
    }

    /**
     * {@inheritdoc}
     */
    public function hasConflictedValue(ConflictInterface $conflict)
    {
        return $this->conflictedValues->contains($conflict);
    }

    /**
     * {@inheritdoc}
     */
    public function setConflictValues($conflicts)
    {
        $this->conflictValues = $conflicts;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getConflictValues()
    {
        return $this->conflictValues;
    }

    /**
     * {@inheritdoc}
     */
    public function addConflictValue(ConflictInterface $conflict)
    {
        return $this->conflictValues->add($conflict);
    }

    /**
     * {@inheritdoc}
     */
    public function removeConflictValue(ConflictInterface $conflict)
    {
        return $this->conflictValues->remove($conflict);
    }

    /**
     * {@inheritdoc}
     */
    public function hasConflictValue(ConflictInterface $conflict)
    {
        return $this->conflictValues->contains($conflict);
    }

    /**
     * {@inheritdoc}
     */
    public function setDependencies($dependencies)
    {
        $this->dependencies = $dependencies;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * {@inheritdoc}
     */
    public function addDependency(DependencyInterface $dependency)
    {
        return $this->dependencies->add($dependency);
    }

    /**
     * {@inheritdoc}
     */
    public function removeDependency(DependencyInterface $dependency)
    {
        return $this->dependencies->remove($dependency);
    }

    /**
     * {@inheritdoc}
     */
    public function hasDependency(DependencyInterface $dependency)
    {
        return $this->dependencies->contains($dependency);
    }

}
