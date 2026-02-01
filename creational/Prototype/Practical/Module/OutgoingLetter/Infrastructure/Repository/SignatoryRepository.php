<?php

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository;

use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Signatory;
use RuntimeException;

class SignatoryRepository
{
    /**
     * @return array<Signatory>
     */
    public function getAll(): array
    {
        return [
            new Signatory(
                1,
                'Self',
                '[Your Signature] – [Your Name]'
            ),
            new Signatory(
                2,
                'Behalf Of Company',
                <<<TEXT
                For and on behalf of [Company Name]
                [Your Signature]
                [Your Name], [Your Role]
                TEXT
            ),
            new Signatory(
                3,
                'Power Of Attorney',
                'pp [Your Signature] for [Person\'s Name]'
            ),
            new Signatory(
                4,
                'Agent',
                <<<TEXT
                [Your Signature]
                [Your Name], Authorized Agent of [Company Name] 
                TEXT
            ),
        ];
    }

    public function find(int $id): Signatory
    {
        foreach ($this->getAll() as $item) {
            if ($item->getId() === $id) {
                return $item;
            }
        }
        throw new RuntimeException('No signatory found');
    }
}
