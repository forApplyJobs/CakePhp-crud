<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cvlist Entity
 *
 * @property int $id
 * @property int|null $info_id
 * @property string|null $title
 * @property string|null $description
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Info $info
 */
class Cvlist extends Entity
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
        'info_id' => true,
        'title' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'info' => true,
    ];
}
