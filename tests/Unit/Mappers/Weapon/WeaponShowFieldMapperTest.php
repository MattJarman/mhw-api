<?php

declare(strict_types=1);

namespace Tests\Unit\Mappers\Weapon;

use App\Mappers\Weapon\WeaponShowFieldMapper;
use stdClass;
use Tests\TestCase;

class WeaponShowFieldMapperTest extends TestCase
{
    private const DETAILS = [
        'id' => '1',
        'name' => 'Buster Sword II',
        'type' => 'great-sword',
        'rarity' => '1',
        'category' => 'test',
        'attack' => '384',
        'true_attack' => '80',
        'affinity' => '0',
        'defense' => '0',
        'elderseal' => null,
        'slot_1' => '0',
        'slot_2' => '0',
        'slot_3' => '0',
        'craftable' => '1',
        'is_final' => '0',
        'element1' => null,
        'element1_attack' => null,
        'element2' => null,
        'element2_attack' => null,
        'element_hidden' => '0',
        'sharpness' => '100,50,80,20,0,0,0',
        'sharpness_maxed' => '0',
        'kinsect_bonus' => null,
        'phial' => null,
        'phial_power' => null,
        'shelling' => null,
        'shelling_level' => null,
        'coating_blast' => null,
        'coating_close' => null,
        'coating_paralysis' => null,
        'coating_poison' => null,
        'coating_power' => null,
        'coating_sleep' => null,
        'notes' => null,
        'previous_weapon_id' => null,
        'previous_weapon' => null,
    ];

    /** @var array<string, mixed> */
    private array $weapon;

    private WeaponShowFieldMapper $mapper;

    public function setUp(): void
    {
        parent::setUp();

        $this->weapon = [
            'details' => (object) self::DETAILS,
            'skills' => [],
            'craftingMaterials' => [],
            'upgradeMaterials' => [],
            'upgrades' => [],
            'ammo' => null,
            'melodies' => null,
        ];

        $this->mapper = new WeaponShowFieldMapper($this->weapon);
    }

    public function testGetName(): void
    {
        self::assertSame(self::DETAILS['name'], $this->mapper->getName());
    }

    public function testGetType(): void
    {
        self::assertSame(self::DETAILS['type'], $this->mapper->getType());
    }

    public function testGetRarity(): void
    {
        self::assertSame((int) self::DETAILS['rarity'], $this->mapper->getRarity());
    }

    public function testGetIcon(): void
    {
        $url = url('/images/equipment/' . self::DETAILS['type'] . '/' . self::DETAILS['rarity'] . '.png');
        self::assertSame($url, $this->mapper->getIcon());
    }

    public function testGetCategory(): void
    {
        self::assertSame(self::DETAILS['category'], $this->mapper->getCategory());
    }

    public function testGetAttack(): void
    {
        self::assertSame((int) self::DETAILS['attack'], $this->mapper->getAttack());
    }

    public function testGetTrueAttack(): void
    {
        self::assertSame((int) self::DETAILS['true_attack'], $this->mapper->getTrueAttack());
    }

    public function testGetAffinity(): void
    {
        self::assertSame((int) self::DETAILS['affinity'], $this->mapper->getAffinity());
    }

    public function testGetDefense(): void
    {
        self::assertSame((int) self::DETAILS['defense'], $this->mapper->getDefense());
    }

    public function testGetElderseal(): void
    {
        self::assertSame(self::DETAILS['elderseal'], $this->mapper->getElderseal());
    }

    public function testGetDecoSlots(): void
    {
        $slots = [
            'slot_1' => (int) self::DETAILS['slot_1'],
            'slot_2' => (int) self::DETAILS['slot_2'],
            'slot_3' => (int) self::DETAILS['slot_3'],
        ];

        self::assertSame($slots, $this->mapper->getDecoSlots());
    }

    /**
     * @param array<string, mixed>   $elements
     * @param array<string, mixed>[] $expected
     *
     * @dataProvider getElementsDataProvider
     */
    public function testGetElements(array $elements, array $expected): void
    {
        $weapon = $this->weapon;
        $weapon['details']->element1 = $elements['one']['element'];
        $weapon['details']->element1_attack = $elements['one']['attack'];
        $weapon['details']->element2 = $elements['two']['element'];
        $weapon['details']->element2_attack = $elements['two']['attack'];
        $weapon['details']->element_hidden = $elements['hidden'];

        $mapper = new WeaponShowFieldMapper($weapon);

        self::assertSame($expected, $mapper->getElements());
    }

    /**
     * @param array<string, mixed>         $sharpness
     * @param array<string, mixed> | false $expected
     *
     * @dataProvider getSharpnessDataProvider
     */
    public function testGetSharpness(array $sharpness, array | false $expected): void
    {
        $weapon = $this->weapon;
        $weapon['details']->sharpness = $sharpness['values'];
        $weapon['details']->maxed = $sharpness['maxed'];

        $mapper = new WeaponShowFieldMapper($weapon);

        self::assertSame($expected, $mapper->getSharpness());
    }

    /**
     * @param array<string, mixed>[] $skills
     * @param array<string, mixed>[] $expected
     *
     * @dataProvider getSkillsDataProvider
     */
    public function testSkills(array $skills, array $expected): void
    {
        $weapon = $this->weapon;
        $weapon['skills'] = $skills;

        $mapper = new WeaponShowFieldMapper($weapon);

        self::assertSame($expected, $mapper->getSkills());
    }

    /**
     * @param array<string, mixed>[] $crafting
     * @param array<string, mixed>[] $expected
     *
     * @dataProvider getCraftingMaterialsDataProvider
     */
    public function testGetCraftingDetails(array $crafting, array $expected): void
    {
        $weapon = $this->weapon;
        $weapon['details']->is_craftable = $crafting['is_craftable'];
        $weapon['details']->is_final = $crafting['is_final'];
        $weapon['details']->previous_weapon_id = $crafting['previous_weapon_id'];
        $weapon['details']->previous_weapon = $crafting['previous_weapon'];
        $weapon['craftingMaterials'] = $crafting['craftingMaterials'];
        $weapon['upgradeMaterials'] = $crafting['upgradeMaterials'];
        $weapon['upgrades'] = $crafting['upgrades'];

        $mapper = new WeaponShowFieldMapper($weapon);

        self::assertSame($expected, $mapper->getCraftingDetails());
    }

    /**
     * @param string|null  $kinsectBonus
     * @param string|false $expected
     *
     * @dataProvider getKinsectBonusDataProvider
     */
    public function testGetKinsectBonus(string | null $kinsectBonus, string | false $expected): void
    {
        $weapon = $this->weapon;
        $weapon['details']->kinsect_bonus = $kinsectBonus;

        $mapper = new WeaponShowFieldMapper($weapon);

        self::assertSame($expected, $mapper->getKinsectBonus());
    }

    /**
     * @param array<string, string>      $phial
     * @param array<string, mixed>|false $expected
     *
     * @dataProvider getPhialDataProvider
     */
    public function testGetPhial(array $phial, array | false $expected): void
    {
        $weapon = $this->weapon;
        $weapon['details']->phial = $phial['type'];
        $weapon['details']->phial_power = $phial['power'];

        $mapper = new WeaponShowFieldMapper($weapon);

        self::assertSame($expected, $mapper->getPhial());
    }

    /**
     * @param array<string, string>      $shelling
     * @param array<string, mixed>|false $expected
     *
     * @dataProvider getShellingDataProvider
     */
    public function testGetShelling(array $shelling, array | false $expected): void
    {
        $weapon = $this->weapon;
        $weapon['details']->shelling = $shelling['type'];
        $weapon['details']->shelling_level = $shelling['level'];

        $mapper = new WeaponShowFieldMapper($weapon);

        self::assertSame($expected, $mapper->getShelling());
    }

    /**
     * @param array<string, string>     $coatings
     * @param array<string, bool>|false $expected
     *
     * @dataProvider getCoatingsDataProvider
     */
    public function testGetCoatings(array $coatings, array | false $expected): void
    {
        $weapon = $this->weapon;
        $weapon['details']->coating_close = $coatings['close'];
        $weapon['details']->coating_power = $coatings['power'];
        $weapon['details']->coating_paralysis = $coatings['paralysis'];
        $weapon['details']->coating_poison = $coatings['poison'];
        $weapon['details']->coating_sleep = $coatings['sleep'];
        $weapon['details']->coating_blast = $coatings['blast'];

        $mapper = new WeaponShowFieldMapper($weapon);

        self::assertSame($expected, $mapper->getCoatings());
    }

    /**
     * @param stdClass|null                 $ammo
     * @param array<string, mixed>[] |false $expected
     *
     * @dataProvider getAmmoDataProvider
     */
    public function testGetAmmo(stdClass | null $ammo, array | false $expected): void
    {
        $weapon = $this->weapon;
        $weapon['ammo'] = $ammo;

        $mapper = new WeaponShowFieldMapper($weapon);

        self::assertSame($expected, $mapper->getAmmo());
    }

    /**
     * @param stdClass[]|null              $melodies
     * @param array<string, mixed>[]|false $expected
     *
     * @dataProvider getMelodiesDataProvider
     */
    public function testGetMelodies(array | null $melodies, array | false $expected): void
    {
        $weapon = $this->weapon;
        $weapon['melodies'] = $melodies;

        $mapper = new WeaponShowFieldMapper($weapon);

        self::assertSame($expected, $mapper->getMelodies());
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getElementsDataProvider(): array
    {
        return [
            'It returns an empty array if weapon has no elements' => [
                'elements' => [
                    'one' => [
                        'element' => null,
                        'attack' => null,
                    ],
                    'two' => [
                        'element' => null,
                        'attack' => null,
                    ],
                    'hidden' => '0',
                ],
                'expected' => [],
            ],
            'It returns an array with one element if the weapon has an element' => [
                'elements' => [
                    'one' => [
                        'element' => 'Ice',
                        'attack' => '210',
                    ],
                    'two' => [
                        'element' => null,
                        'attack' => null,
                    ],
                    'hidden' => '0',
                ],
                'expected' => [
                    [
                        'element' => 'Ice',
                        'attack' => 210,
                        'hidden' => false,
                    ],
                ],
            ],
            'It returns an array with two elements if the weapon has two elements' => [
                'elements' => [
                    'one' => [
                        'element' => 'Ice',
                        'attack' => '210',
                    ],
                    'two' => [
                        'element' => 'Blast',
                        'attack' => '210',
                    ],
                    'hidden' => '0',
                ],
                'expected' => [
                    [
                        'element' => 'Ice',
                        'attack' => 210,
                        'hidden' => false,
                    ],
                    [
                        'element' => 'Blast',
                        'attack' => 210,
                        'hidden' => false,
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getSharpnessDataProvider(): array
    {
        return [
            'It returns false if weapon has no sharpness' => [
                'sharpness' => [
                    'values' => null,
                    'maxed' => '0',
                ],
                'expected' => false,
            ],
            'It returns the formatted sharpness if the weapon has sharpness' => [
                'sharpness' => [
                    'values' => '100,50,80,20,0,0,0',
                    'maxed' => '0',
                ],
                'expected' => [
                    'maxed' => false,
                    'values' => [
                        'red' => 100,
                        'orange' => 50,
                        'yellow' => 80,
                        'green' => 20,
                        'blue' => 0,
                        'white' => 0,
                        'purple' => 0,
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getSkillsDataProvider(): array
    {
        return [
            'It returns an array with one skill if the weapon has one' => [
                'skills' => [
                    (object) [
                        'id' => '1191',
                        'name' => 'Guts',
                        'level' => '1',
                        'max_level' => '1',
                        'secret' => '0',
                        'icon_color' => null,
                    ],
                ],
                'expected' => [
                    [
                        'name' => 'Guts',
                        'level' => 1,
                        'max_level' => 1,
                        'is_secret' => false,
                    ],
                ],
            ],
            'It returns an empty array if weapon has no skills' => [
                'skills' => [],
                'expected' => [],
            ],
        ];
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getCraftingMaterialsDataProvider(): array
    {
        return [
            'It returns the correct crafting details with no crafting materials, upgrade materials, or upgrades' => [
                'crafting' => [
                    'is_craftable' => false,
                    'is_final' => true,
                    'craftingMaterials' => [],
                    'upgradeMaterials' => [],
                    'upgrades' => [],
                    'previous_weapon_id' => 1,
                    'previous_weapon' => 'Buster Sword I',
                ],
                'expected' => [
                    'is_craftable' => true,
                    'is_final' => true,
                    'crafting_cost' => [],
                    'upgrade_cost' => [],
                    'previous_weapon' => [
                        'id' => 1,
                        'name' => 'Buster Sword I',
                        'url' => 'http://localhost/api/weapon/1',
                    ],
                    'upgrades' => [],
                ],
            ],
            'It returns the correct crafting details with crafting materials provided' => [
                'crafting' => [
                    'is_craftable' => false,
                    'is_final' => true,
                    'craftingMaterials' => [
                        (object) [
                            'id' => '115',
                            'name' => 'Iron Ore',
                            'icon_name' => 'Ore',
                            'icon_color' => 'Gray',
                            'quantity' => '1',
                        ],
                    ],
                    'upgradeMaterials' => [],
                    'upgrades' => [],
                    'previous_weapon_id' => null,
                    'previous_weapon' => null,
                ],
                'expected' => [
                    'is_craftable' => true,
                    'is_final' => true,
                    'crafting_cost' => [
                        [
                            'id' => 115,
                            'name' => 'Iron Ore',
                            'quantity' => 1,
                            'url' => 'http://localhost/api/item/115',
                            'icon_url' => 'http://localhost/images/items/ore/gray.png',
                        ],
                    ],
                    'upgrade_cost' => [],
                    'previous_weapon' => false,
                    'upgrades' => [],
                ],
            ],
            'It returns the correct crafting details with upgrade materials provided' => [
                'crafting' => [
                    'is_craftable' => false,
                    'is_final' => true,
                    'craftingMaterials' => [],
                    'upgradeMaterials' => [
                        (object) [
                            'id' => '115',
                            'name' => 'Iron Ore',
                            'icon_name' => 'Ore',
                            'icon_color' => 'Gray',
                            'quantity' => '2',
                        ],
                    ],
                    'upgrades' => [],
                    'previous_weapon_id' => null,
                    'previous_weapon' => null,
                ],
                'expected' => [
                    'is_craftable' => true,
                    'is_final' => true,
                    'crafting_cost' => [],
                    'upgrade_cost' => [
                        [
                            'id' => 115,
                            'name' => 'Iron Ore',
                            'quantity' => 2,
                            'url' => 'http://localhost/api/item/115',
                            'icon_url' => 'http://localhost/images/items/ore/gray.png',
                        ],
                    ],
                    'previous_weapon' => false,
                    'upgrades' => [],
                ],
            ],
            'It returns the correct crafting details with upgrades provided' => [
                'crafting' => [
                    'is_craftable' => false,
                    'is_final' => true,
                    'craftingMaterials' => [],
                    'upgradeMaterials' => [],
                    'upgrades' => [
                        (object) [
                            'id' => '2',
                            'name' => 'Buster Sword II',
                            'upgrade_recipe_id' => '1562',
                        ],
                    ],
                    'previous_weapon_id' => null,
                    'previous_weapon' => null,
                ],
                'expected' => [
                    'is_craftable' => true,
                    'is_final' => true,
                    'crafting_cost' => [],
                    'upgrade_cost' => [],
                    'previous_weapon' => false,
                    'upgrades' => [
                        [
                            'id' => 2,
                            'name' => 'Buster Sword II',
                            'url' => 'http://localhost/api/weapon/2',
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getKinsectBonusDataProvider(): array
    {
        return [
            'It returns the kinsect bonus if one is set' => [
                'kinsectBonus' => 'sever',
                'expected' => 'sever',
            ],
            'It returns false if no kinsect bonus is set' => [
                'kinsectBonus' => null,
                'expected' => false,
            ],
        ];
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getPhialDataProvider(): array
    {
        return [
            'It returns the phial type and power if set' => [
                'phial' => [
                    'type' => 'poison',
                    'power' => '300',
                ],
                'expected' => [
                    'type' => 'poison',
                    'power' => 300,
                ],
            ],
            'It returns false if no phial type is set' => [
                'phial' => [
                    'type' => null,
                    'power' => null,
                ],
                'expected' => false,
            ],
        ];
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getShellingDataProvider(): array
    {
        return [
            'It returns the shelling and level if set' => [
                'shelling' => [
                    'type' => 'normal',
                    'level' => '1',
                ],
                'expected' => [
                    'type' => 'normal',
                    'level' => 1,
                ],
            ],
            'It returns false if no shelling type is set' => [
                'shelling' => [
                    'type' => null,
                    'level' => null,
                ],
                'expected' => false,
            ],
        ];
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getCoatingsDataProvider(): array
    {
        return [
            'It returns coatings if close coating is set' => [
                'coatings' => [
                    'close' => 'true',
                    'power' => 'true',
                    'paralysis' => 'true',
                    'poison' => 'true',
                    'sleep' => 'true',
                    'blast' => 'true',
                ],
                'expected' => [
                    'close' => true,
                    'power' => true,
                    'paralysis' => true,
                    'poison' => true,
                    'sleep' => true,
                    'blast' => true,
                ],
            ],
            'It returns false if close coating is not set' => [
                'coatings' => [
                    'close' => null,
                    'power' => null,
                    'paralysis' => null,
                    'poison' => null,
                    'sleep' => null,
                    'blast' => null,
                ],
                'expected' => false,
            ],
        ];
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getAmmoDataProvider(): array
    {
        return [
            'It returns ammo if weapon weapon has ammo' => [
                'ammo' => (object) [
                    'id' => '75',
                    'deviation' => '1',
                    'special_ammo' => 'Wyvernheart',
                    'normal1_clip' => '9',
                    'normal1_rapid' => '0',
                    'normal1_recoil' => '1',
                    'normal1_reload' => 'normal',
                    'normal2_clip' => '6',
                    'normal2_rapid' => '0',
                    'normal2_recoil' => '2',
                    'normal2_reload' => 'normal',
                    'normal3_clip' => '5',
                    'normal3_rapid' => '0',
                    'normal3_recoil' => '2',
                    'normal3_reload' => 'slow',
                    'pierce1_clip' => '7',
                    'pierce1_rapid' => '0',
                    'pierce1_recoil' => '2',
                    'pierce1_reload' => 'slow',
                    'pierce2_clip' => '5',
                    'pierce2_rapid' => '0',
                    'pierce2_recoil' => '2',
                    'pierce2_reload' => 'slow',
                    'pierce3_clip' => '4',
                    'pierce3_rapid' => '0',
                    'pierce3_recoil' => '3',
                    'pierce3_reload' => 'slow',
                    'spread1_clip' => '6',
                    'spread1_rapid' => '0',
                    'spread1_recoil' => '1',
                    'spread1_reload' => 'normal',
                    'spread2_clip' => '0',
                    'spread2_rapid' => '0',
                    'spread2_recoil' => '0',
                    'spread2_reload' => null,
                    'spread3_clip' => '0',
                    'spread3_rapid' => '0',
                    'spread3_recoil' => '0',
                    'spread3_reload' => null,
                    'sticky1_clip' => '3',
                    'sticky1_rapid' => '0',
                    'sticky1_recoil' => '2',
                    'sticky1_reload' => 'slow',
                    'sticky2_clip' => '3',
                    'sticky2_rapid' => '0',
                    'sticky2_recoil' => '3',
                    'sticky2_reload' => 'very slow',
                    'sticky3_clip' => '0',
                    'sticky3_rapid' => '0',
                    'sticky3_recoil' => '0',
                    'sticky3_reload' => null,
                    'cluster1_clip' => '2',
                    'cluster1_rapid' => '0',
                    'cluster1_recoil' => '2',
                    'cluster1_reload' => 'very slow',
                    'cluster2_clip' => '0',
                    'cluster2_rapid' => '0',
                    'cluster2_recoil' => '0',
                    'cluster2_reload' => null,
                    'cluster3_clip' => null,
                    'cluster3_rapid' => null,
                    'cluster3_recoil' => null,
                    'cluster3_reload' => null,
                    'recover1_clip' => '2',
                    'recover1_rapid' => '0',
                    'recover1_recoil' => '4',
                    'recover1_reload' => 'very slow',
                    'recover2_clip' => '0',
                    'recover2_rapid' => '0',
                    'recover2_recoil' => '0',
                    'recover2_reload' => null,
                    'poison1_clip' => '4',
                    'poison1_rapid' => '0',
                    'poison1_recoil' => '2',
                    'poison1_reload' => 'slow',
                    'poison2_clip' => '3',
                    'poison2_rapid' => '0',
                    'poison2_recoil' => '3',
                    'poison2_reload' => 'very slow',
                    'paralysis1_clip' => '0',
                    'paralysis1_rapid' => '0',
                    'paralysis1_recoil' => '0',
                    'paralysis1_reload' => null,
                    'paralysis2_clip' => '0',
                    'paralysis2_rapid' => '0',
                    'paralysis2_recoil' => '0',
                    'paralysis2_reload' => null,
                    'sleep1_clip' => '0',
                    'sleep1_rapid' => '0',
                    'sleep1_recoil' => '0',
                    'sleep1_reload' => null,
                    'sleep2_clip' => '0',
                    'sleep2_rapid' => '0',
                    'sleep2_recoil' => '0',
                    'sleep2_reload' => null,
                    'exhaust1_clip' => '0',
                    'exhaust1_rapid' => '0',
                    'exhaust1_recoil' => '0',
                    'exhaust1_reload' => null,
                    'exhaust2_clip' => '0',
                    'exhaust2_rapid' => '0',
                    'exhaust2_recoil' => '0',
                    'exhaust2_reload' => null,
                    'flaming_clip' => '0',
                    'flaming_rapid' => '0',
                    'flaming_recoil' => '0',
                    'flaming_reload' => null,
                    'water_clip' => '0',
                    'water_rapid' => '0',
                    'water_recoil' => '0',
                    'water_reload' => null,
                    'freeze_clip' => '0',
                    'freeze_rapid' => '0',
                    'freeze_recoil' => '0',
                    'freeze_reload' => null,
                    'thunder_clip' => '0',
                    'thunder_rapid' => '0',
                    'thunder_recoil' => '0',
                    'thunder_reload' => null,
                    'dragon_clip' => '0',
                    'dragon_rapid' => '0',
                    'dragon_recoil' => '0',
                    'dragon_reload' => null,
                    'slicing_clip' => '3',
                    'slicing_rapid' => '0',
                    'slicing_recoil' => '3',
                    'slicing_reload' => 'very slow',
                    'wyvern_clip' => '1',
                    'wyvern_reload' => 'very slow',
                    'demon_clip' => '0',
                    'demon_recoil' => '0',
                    'demon_reload' => null,
                    'armor_clip' => '2',
                    'armor_recoil' => '4',
                    'armor_reload' => 'very slow',
                    'tranq_clip' => '3',
                    'tranq_recoil' => '2',
                    'tranq_reload' => 'slow',
                ],
                'expected' => [
                    'deviation' => 1,
                    'special' => 'Wyvernheart',
                    'normal' => [
                        'normal_1' => [
                            'clip' => 9,
                            'rapid' => 0,
                            'recoil' => 1,
                            'reload' => 'normal',
                        ],
                        'normal_2' => [
                            'clip' => 6,
                            'rapid' => 0,
                            'recoil' => 2,
                            'reload' => 'normal',
                        ],
                        'normal_3' => [
                            'clip' => 5,
                            'rapid' => 0,
                            'recoil' => 2,
                            'reload' => 'slow',
                        ],
                    ],
                    'pierce' => [
                        'pierce_1' => [
                            'clip' => 7,
                            'rapid' => 0,
                            'recoil' => 2,
                            'reload' => 'slow',
                        ],
                        'pierce_2' => [
                            'clip' => 5,
                            'rapid' => 0,
                            'recoil' => 2,
                            'reload' => 'slow',
                        ],
                        'pierce_3' => [
                            'clip' => 4,
                            'rapid' => 0,
                            'recoil' => 3,
                            'reload' => 'slow',
                        ],
                    ],
                    'spread' => [
                        'spread_1' => [
                            'clip' => 6,
                            'rapid' => 0,
                            'recoil' => 1,
                            'reload' => 'normal',
                        ],
                        'spread_2' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                        'spread_3' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                    ],
                    'sticky' => [
                        'sticky_1' => [
                            'clip' => 3,
                            'rapid' => 0,
                            'recoil' => 2,
                            'reload' => 'slow',
                        ],
                        'sticky_2' => [
                            'clip' => 3,
                            'rapid' => 0,
                            'recoil' => 3,
                            'reload' => 'very slow',
                        ],
                        'sticky_3' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                    ],
                    'cluster' => [
                        'cluster_1' => [
                            'clip' => 2,
                            'rapid' => 0,
                            'recoil' => 2,
                            'reload' => 'very slow',
                        ],
                        'cluster_2' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                        'cluster_3' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                    ],
                    'recover' => [
                        'recover_1' => [
                            'clip' => 2,
                            'rapid' => 0,
                            'recoil' => 4,
                            'reload' => 'very slow',
                        ],
                        'recover_2' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                    ],
                    'poison' => [
                        'poison_1' => [
                            'clip' => 4,
                            'rapid' => 0,
                            'recoil' => 2,
                            'reload' => 'slow',
                        ],
                        'poison_2' => [
                            'clip' => 4,
                            'rapid' => 0,
                            'recoil' => 2,
                            'reload' => 'slow',
                        ],
                    ],
                    'paralysis' => [
                        'paralysis_1' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                        'paralysis_2' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                    ],
                    'sleep' => [
                        'sleep_1' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                        'sleep_2' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                    ],
                    'exhaust' => [
                        'exhaust_1' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                        'exhaust_2' => [
                            'clip' => 0,
                            'rapid' => 0,
                            'recoil' => 0,
                            'reload' => null,
                        ],
                    ],
                    'flaming' => [
                        'clip' => 0,
                        'rapid' => 0,
                        'recoil' => 0,
                        'reload' => null,
                    ],
                    'water' => [
                        'clip' => 0,
                        'rapid' => 0,
                        'recoil' => 0,
                        'reload' => null,
                    ],
                    'freeze' => [
                        'clip' => 0,
                        'rapid' => 0,
                        'recoil' => 0,
                        'reload' => null,
                    ],
                    'thunder' => [
                        'clip' => 0,
                        'rapid' => 0,
                        'recoil' => 0,
                        'reload' => null,
                    ],
                    'dragon' => [
                        'clip' => 0,
                        'rapid' => 0,
                        'recoil' => 0,
                        'reload' => null,
                    ],
                    'slicing' => [
                        'clip' => 3,
                        'rapid' => 0,
                        'recoil' => 3,
                        'reload' => 'very slow',
                    ],
                    'wyvern' => [
                        'clip' => 1,
                        'reload' => 'very slow',
                    ],
                    'demon' => [
                        'clip' => 0,
                        'recoil' => 0,
                        'reload' => null,
                    ],
                    'armor' => [
                        'clip' => 2,
                        'recoil' => 4,
                        'reload' => 'very slow',
                    ],
                    'tranq' => [
                        'clip' => 3,
                        'recoil' => 2,
                        'reload' => 'slow',
                    ],
                ],
            ],
            'It returns false if weapon has no ammo' => [
                'ammo' => null,
                'expected' => false,
            ],
        ];
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getMelodiesDataProvider(): array
    {
        return [
            'It returns melodies if weapon has melodies' => [
                'melodies' => [
                    (object) [
                        'notes' => 'WW',
                        'name' => 'Self-improvement',
                        'effect1' => 'Movement Speed Up',
                        'effect2' => 'Attack Up + Deflected Attack Prevention',
                        'base_duration' => '180',
                        'base_extension' => '90',
                        'm1_duration' => '240',
                        'm1_extension' => '120',
                        'm2_duration' => '300',
                        'm2_extension' => '150',
                    ],
                ],
                'expected' => [
                    [
                        'name' => 'Self-improvement',
                        'notes' => 'WW',
                        'effect_1' => 'Movement Speed Up',
                        'effect_2' => 'Attack Up + Deflected Attack Prevention',
                        'base' => [
                            'duration' => 180,
                            'extension' => 90,
                        ],
                        'maestro' => [
                            'level_1' => [
                                'duration' => 240,
                                'extension' => 120,
                            ],
                            'level_2' => [
                                'duration' => 300,
                                'extension' => 150,
                            ],
                        ],
                    ],
                ],
            ],
            'It returns false if weapon has no melodies' => [
                'melodies' => null,
                'expected' => false,
            ],
        ];
    }
}
