<?php

namespace Devhelp\Normalizer\Fields;


use Devhelp\Normalizer\Core\NormalizerInterface;
use Devhelp\Normalizer\Fields\Matcher\MatcherInterface;
use Devhelp\Normalizer\Fields\Source\Field;

class FieldsNormalizer implements NormalizerInterface
{

    /**
     * @var MatcherInterface
     */
    private $matcher;

    /**
     * @var array
     */
    private $fields = array();

    public function __construct(MatcherInterface $matcher, array $fields = array())
    {
        $this->matcher = $matcher;
        foreach ($fields as $field) {
            $this->addField($field);
        }
    }

    public function addField(Field $field)
    {
        $this->fields[] = $field;
        return $this;
    }

    /**
     * @param $data
     * @return boolean
     */
    public function supports($data)
    {
        return $this->matcher->match($data);
    }

    public function normalize($data)
    {
        $normalized = array();

        foreach ($this->fields as $field) {
            $normalized[$field->getName()] = $field->filter($data);
        }

        return $normalized;
    }
}
