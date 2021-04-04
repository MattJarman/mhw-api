<?php

declare(strict_types=1);

namespace App\Mappers\Weapon;

use stdClass;

class WeaponAmmoMapper
{
    /** @var array<string, mixed> */
    private array $ammo;

    public function __construct(stdClass $ammo)
    {
        $this->ammo = $this->map($ammo);
    }

    /**
     * @return array<string, mixed>
     */
    public function get(): array
    {
        return $this->ammo;
    }

    /**
     * @param stdClass $ammo
     *
     * @return array<string, mixed>
     */
    private function map(stdClass $ammo): array
    {
        return [
            'deviation' => (int) $ammo->deviation,
            'special' => $ammo->special_ammo,
            'normal' => [
                'normal_1' => [
                    'clip' => (int) $ammo->normal1_clip,
                    'rapid' => (int) $ammo->normal1_rapid,
                    'recoil' => (int) $ammo->normal1_recoil,
                    'reload' => $ammo->normal1_reload,
                ],
                'normal_2' => [
                    'clip' => (int) $ammo->normal2_clip,
                    'rapid' => (int) $ammo->normal2_rapid,
                    'recoil' => (int) $ammo->normal2_recoil,
                    'reload' => $ammo->normal2_reload,
                ],
                'normal_3' => [
                    'clip' => (int) $ammo->normal3_clip,
                    'rapid' => (int) $ammo->normal3_rapid,
                    'recoil' => (int) $ammo->normal3_recoil,
                    'reload' => $ammo->normal3_reload,
                ],
            ],
            'pierce' => [
                'pierce_1' => [
                    'clip' => (int) $ammo->pierce1_clip,
                    'rapid' => (int) $ammo->pierce1_rapid,
                    'recoil' => (int) $ammo->pierce1_recoil,
                    'reload' => $ammo->pierce1_reload,
                ],
                'pierce_2' => [
                    'clip' => (int) $ammo->pierce2_clip,
                    'rapid' => (int) $ammo->pierce2_rapid,
                    'recoil' => (int) $ammo->pierce2_recoil,
                    'reload' => $ammo->pierce2_reload,
                ],
                'pierce_3' => [
                    'clip' => (int) $ammo->pierce3_clip,
                    'rapid' => (int) $ammo->pierce3_rapid,
                    'recoil' => (int) $ammo->pierce3_recoil,
                    'reload' => $ammo->pierce3_reload,
                ],
            ],
            'spread' => [
                'spread_1' => [
                    'clip' => (int) $ammo->spread1_clip,
                    'rapid' => (int) $ammo->spread1_rapid,
                    'recoil' => (int) $ammo->spread1_recoil,
                    'reload' => $ammo->spread1_reload,
                ],
                'spread_2' => [
                    'clip' => (int) $ammo->spread2_clip,
                    'rapid' => (int) $ammo->spread2_rapid,
                    'recoil' => (int) $ammo->spread2_recoil,
                    'reload' => $ammo->spread2_reload,
                ],
                'spread_3' => [
                    'clip' => (int) $ammo->spread3_clip,
                    'rapid' => (int) $ammo->spread3_rapid,
                    'recoil' => (int) $ammo->spread3_recoil,
                    'reload' => $ammo->spread3_reload,
                ],
            ],
            'sticky' => [
                'sticky_1' => [
                    'clip' => (int) $ammo->sticky1_clip,
                    'rapid' => (int) $ammo->sticky1_rapid,
                    'recoil' => (int) $ammo->sticky1_recoil,
                    'reload' => $ammo->sticky1_reload,
                ],
                'sticky_2' => [
                    'clip' => (int) $ammo->sticky2_clip,
                    'rapid' => (int) $ammo->sticky2_rapid,
                    'recoil' => (int) $ammo->sticky2_recoil,
                    'reload' => $ammo->sticky2_reload,
                ],
                'sticky_3' => [
                    'clip' => (int) $ammo->sticky3_clip,
                    'rapid' => (int) $ammo->sticky3_rapid,
                    'recoil' => (int) $ammo->sticky3_recoil,
                    'reload' => $ammo->sticky3_reload,
                ],
            ],
            'cluster' => [
                'cluster_1' => [
                    'clip' => (int) $ammo->cluster1_clip,
                    'rapid' => (int) $ammo->cluster1_rapid,
                    'recoil' => (int) $ammo->cluster1_recoil,
                    'reload' => $ammo->cluster1_reload,
                ],
                'cluster_2' => [
                    'clip' => (int) $ammo->cluster2_clip,
                    'rapid' => (int) $ammo->cluster2_rapid,
                    'recoil' => (int) $ammo->cluster2_recoil,
                    'reload' => $ammo->cluster2_reload,
                ],
                'cluster_3' => [
                    'clip' => (int) $ammo->cluster3_clip,
                    'rapid' => (int) $ammo->cluster3_rapid,
                    'recoil' => (int) $ammo->cluster3_recoil,
                    'reload' => $ammo->cluster3_reload,
                ],
            ],
            'recover' => [
                'recover_1' => [
                    'clip' => (int) $ammo->recover1_clip,
                    'rapid' => (int) $ammo->recover1_rapid,
                    'recoil' => (int) $ammo->recover1_recoil,
                    'reload' => $ammo->recover1_reload,
                ],
                'recover_2' => [
                    'clip' => (int) $ammo->recover2_clip,
                    'rapid' => (int) $ammo->recover2_rapid,
                    'recoil' => (int) $ammo->recover2_recoil,
                    'reload' => $ammo->recover2_reload,
                ],
            ],
            'poison' => [
                'poison_1' => [
                    'clip' => (int) $ammo->poison1_clip,
                    'rapid' => (int) $ammo->poison1_rapid,
                    'recoil' => (int) $ammo->poison1_recoil,
                    'reload' => $ammo->poison1_reload,
                ],
                'poison_2' => [
                    'clip' => (int) $ammo->poison1_clip,
                    'rapid' => (int) $ammo->poison1_rapid,
                    'recoil' => (int) $ammo->poison1_recoil,
                    'reload' => $ammo->poison1_reload,
                ],
            ],
            'paralysis' => [
                'paralysis_1' => [
                    'clip' => (int) $ammo->paralysis1_clip,
                    'rapid' => (int) $ammo->paralysis1_rapid,
                    'recoil' => (int) $ammo->paralysis1_recoil,
                    'reload' => $ammo->paralysis1_reload,
                ],
                'paralysis_2' => [
                    'clip' => (int) $ammo->paralysis2_clip,
                    'rapid' => (int) $ammo->paralysis2_rapid,
                    'recoil' => (int) $ammo->paralysis2_recoil,
                    'reload' => $ammo->paralysis2_reload,
                ],
            ],
            'sleep' => [
                'sleep_1' => [
                    'clip' => (int) $ammo->sleep1_clip,
                    'rapid' => (int) $ammo->sleep1_rapid,
                    'recoil' => (int) $ammo->sleep1_recoil,
                    'reload' => $ammo->sleep1_reload,
                ],
                'sleep_2' => [
                    'clip' => (int) $ammo->sleep2_clip,
                    'rapid' => (int) $ammo->sleep2_rapid,
                    'recoil' => (int) $ammo->sleep2_recoil,
                    'reload' => $ammo->sleep2_reload,
                ],
            ],
            'exhaust' => [
                'exhaust_1' => [
                    'clip' => (int) $ammo->exhaust1_clip,
                    'rapid' => (int) $ammo->exhaust1_rapid,
                    'recoil' => (int) $ammo->exhaust1_recoil,
                    'reload' => $ammo->exhaust1_reload,
                ],
                'exhaust_2' => [
                    'clip' => (int) $ammo->exhaust2_clip,
                    'rapid' => (int) $ammo->exhaust2_rapid,
                    'recoil' => (int) $ammo->exhaust2_recoil,
                    'reload' => $ammo->exhaust2_reload,
                ],
            ],
            'flaming' => [
                'clip' => (int) $ammo->flaming_clip,
                'rapid' => (int) $ammo->flaming_rapid,
                'recoil' => (int) $ammo->flaming_recoil,
                'reload' => $ammo->flaming_reload,
            ],
            'water' => [
                'clip' => (int) $ammo->water_clip,
                'rapid' => (int) $ammo->water_rapid,
                'recoil' => (int) $ammo->water_recoil,
                'reload' => $ammo->water_reload,
            ],
            'freeze' => [
                'clip' => (int) $ammo->freeze_clip,
                'rapid' => (int) $ammo->freeze_rapid,
                'recoil' => (int) $ammo->freeze_recoil,
                'reload' => $ammo->freeze_reload,
            ],
            'thunder' => [
                'clip' => (int) $ammo->thunder_clip,
                'rapid' => (int) $ammo->thunder_rapid,
                'recoil' => (int) $ammo->thunder_recoil,
                'reload' => $ammo->thunder_reload,
            ],
            'dragon' => [
                'clip' => (int) $ammo->dragon_clip,
                'rapid' => (int) $ammo->dragon_rapid,
                'recoil' => (int) $ammo->dragon_recoil,
                'reload' => $ammo->dragon_reload,
            ],
            'slicing' => [
                'clip' => (int) $ammo->slicing_clip,
                'rapid' => (int) $ammo->slicing_rapid,
                'recoil' => (int) $ammo->slicing_recoil,
                'reload' => $ammo->slicing_reload,
            ],
            'wyvern' => [
                'clip' => (int) $ammo->wyvern_clip,
                'reload' => $ammo->wyvern_reload,
            ],
            'demon' => [
                'clip' => (int) $ammo->demon_clip,
                'recoil' => (int) $ammo->demon_recoil,
                'reload' => $ammo->demon_reload,
            ],
            'armor' => [
                'clip' => (int) $ammo->armor_clip,
                'recoil' => (int) $ammo->armor_recoil,
                'reload' => $ammo->armor_reload,
            ],
            'tranq' => [
                'clip' => (int) $ammo->tranq_clip,
                'recoil' => (int) $ammo->tranq_recoil,
                'reload' => $ammo->tranq_reload,
            ],
        ];
    }
}
