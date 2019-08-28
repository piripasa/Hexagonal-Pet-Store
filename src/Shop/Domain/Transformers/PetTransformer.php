<?php
namespace Hexa\Shop\Domain\Transformers;

class PetTransformer extends BaseTransformer
{
    public function transform($object)
    {
        return [
            'id' => (int) $object->id,
            'name' => (string) $object->name,
            'dob' => (string) $object->dob,
            'chip_identifier' => (string) $object->chip_identifier,
            'chip_implanted_at' => $object->chip_implanted_at,
            'price' => (double) $object->price,
            'status' => (string) $object->status,
            'description' => (string) $object->description,
            'category' => $object->category->name,
            'public' => (bool) $object->public,
        ];
    }
}
