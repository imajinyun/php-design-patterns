<?php

namespace DesignPattern\Behavioral\Specification;

class LogicalSpecification extends AbstractSpecification
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var SpecificationInterface[]|array
     */
    private $specifications;

    /**
     * LogicalSpecification constructor.
     *
     * @param string $type
     * @param SpecificationInterface[] ...$specification
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(
        string $type,
        SpecificationInterface ...$specification
    )
    {
        $this->type = strtolower(trim($type));
        self::checkType($this->type);
        $this->specifications = $specification;
    }

    /**
     * If at least one specification is false, return false, else return true.
     *
     * @param Item $item
     *
     * @return bool
     */
    public function isSatisfiedBy(Item $item): bool
    {
        $type = $this->type;

        if ($type === 'not') {
            return !$this->specifications[0]->isSatisfiedBy($item);
        }

        $flag = $type === 'and';
        foreach ($this->specifications as $specification) {
            if ($flag && !$specification->isSatisfiedBy($item)) {
                return false;
            } elseif (!$flag && $specification->isSatisfiedBy($item)) {
                return true;
            }
        }

        return $flag;
    }

    /**
     * Check logical type.
     *
     * @param string $type
     *
     * @throws \InvalidArgumentException
     */
    private static function checkType(string $type)
    {
        if (!\in_array($type, ['not', 'and', 'or'], true)) {
            throw new \InvalidArgumentException('Logical type parameter error.');
        }
    }
}
