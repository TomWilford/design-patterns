<?php

namespace Creational\Prototype\Practical\Module\OutgoingLetter\Infrastructure\Repository;

use Creational\Prototype\Practical\Module\OutgoingLetter\Domain\Document\Clause;
use RuntimeException;

class ClauseRepository
{
    /**
     * @return array<Clause>
     */
    public function getAll(): array
    {
        return [
            new Clause(
                1,
                'Without Prejudice',
                'This letter is sent without prejudice to the position of [Client Name] and shall not be admissible in evidence in any proceedings.'
            ),
            new Clause(
                2,
                'Subject to Contract',
                'This offer is made subject to contract and no legally binding agreement shall come into existence until a formal agreement is executed.'
            ),
            new Clause(
                3,
                'Confidentiality Clause',
                'This letter is confidential and intended solely for the addressee. It may not be disclosed to any third party without prior written consent.'
            ),
            new Clause(
                4,
                'Governing Law and Jurisdiction',
                'this letter is governed by the laws of [England and Wales], and the parties submit to the exclusive jurisdiction of the courts of [London].'
            ),
            new Clause(
                5,
                'Authority',
                'We confirm that we act for [Client Name] and are authorized to send this letter on their behalf.'
            )
        ];
    }

    public function find(int $id): Clause
    {
        foreach ($this->getAll() as $item) {
            if ($item->getId() === $id) {
                return $item;
            }
        }
        throw new RuntimeException('No clause found');
    }
}
