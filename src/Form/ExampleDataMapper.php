<?php


namespace App\DataMapper;


use App\Entity\Example;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\FormInterface;

class ExampleDataMapper implements DataMapperInterface
{
    /**
     * @param Example $data
     * @param FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        if (null !== $data) {
            $forms = iterator_to_array($forms);
            $forms['id']->setData($data->getId());
            $forms['name']->setData($data->getName());
            $forms['score']->setData($data->getScore());
        }
    }

    /**
     * @param FormInterface[]|\Traversable $forms
     * @param Example $data
     */
    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);

        if (null === $data) {
            $id = $forms['id']->getData();
            $name = $forms['name']->getData();
            $score = $forms['score']->getData();

            // New entity is created
            $data = new Example(
                $id,
                $name,
                $score
            );
        } else {
            $data->update(
                $forms['score']->getData()
            );
        }
    }
}
