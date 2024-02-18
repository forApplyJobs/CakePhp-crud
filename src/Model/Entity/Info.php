<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Info Entity
 *
 * @property int $id
 * @property string|null $header
 * @property string|null $description
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Cvlist[] $cvlist
 */
class Info extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'phone' => true,
        'created' => true,
        'header' => true, 
        'description' => true, 
    ];
}
