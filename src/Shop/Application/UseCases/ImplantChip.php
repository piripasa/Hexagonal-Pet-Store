<?php
namespace Hexa\Shop\Application\UseCases;

use Carbon\Carbon;
use Hexa\Shop\Domain\Repositories\PetRepository;

class ImplantChip
{
    private $petRepository;

    public function __construct(PetRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function __invoke(int $id, string $chip, string $implantDate)
    {
        $pet = $this->petRepository->find($id);

        if (!$pet) {
            throw new \Exception('Pet not found');
        }

        if (!$pet->category->need_chip) {
            throw new \Exception('No chip needed for this pet');
        }

        if ($pet->chip_identifier) {
            throw new \Exception('Chip already implanted');
        }

        if ($pet->category->need_chip && Carbon::now()->diffInMonths(Carbon::parse($pet->dob)) < $pet->category->chip_age_limit) {
            throw new \Exception('Chip can not be implanted due to age!');
        }

        $pet->fill([
            'chip_identifier' => $chip,
            'chip_implanted_at' => $implantDate
        ]);
        $pet->save();

        return $pet;
    }
}
