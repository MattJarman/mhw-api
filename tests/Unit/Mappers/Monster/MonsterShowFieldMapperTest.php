<?php

declare(strict_types=1);

namespace Tests\Unit\Mappers\Monster;

use App\Mappers\Monster\MonsterShowFieldMapper;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

use function url;

class MonsterShowFieldMapperTest extends TestCase
{
    private const DETAILS = [
        'id' => '31',
        'name' => 'Rathalos',
        'size' => 'large',
        'description' => 'The apex monster of the Ancient Forest, also known as the \'King of the Skies.\'
            A terrible wyvern that descends upon invaders, attacking with poison claws and fiery breath.',
        'ecology' => 'Flying Wyvern',
        'colour' => 'Red',
        'pitfall_trap' => '1',
        'shock_trap' => '1',
        'vine_trap' => '1',
        'ailment_roar' => 'large',
        'ailment_wind' => 'large',
        'ailment_tremor' => null,
        'ailment_defensedown' => '0',
        'ailment_fireblight' => '1',
        'ailment_waterblight' => '0',
        'ailment_thunderblight' => '0',
        'ailment_iceblight' => '0',
        'ailment_dragonblight' => '0',
        'ailment_blastblight' => '0',
        'ailment_regional' => '0',
        'ailment_poison' => '1',
        'ailment_sleep' => '0',
        'ailment_paralysis' => '0',
        'ailment_bleed' => '0',
        'ailment_stun' => '0',
        'ailment_mud' => '0',
        'ailment_effluvia' => '0',
        'weakness_fire' => '0',
        'weakness_water' => '1',
        'weakness_ice' => '1',
        'weakness_thunder' => '2',
        'weakness_dragon' => '3',
        'weakness_poison' => '1',
        'weakness_sleep' => '2',
        'weakness_paralysis' => '2',
        'weakness_blast' => '1',
        'weakness_stun' => '2',
    ];

    private const HABITAT = [
        'name' => 'Ancient Forest',
        'start_area' => 1,
        'move_area' => '1,2,3,4,5',
        'rest_area' => '5',
    ];

    private const REWARD_ONE = [
        'id' => '1',
        'name' => 'Rathalos Scale',
        'rank' => 'LR',
        'percentage' => '100',
        'condition' => 'Track',
        'stack' => '1',
        'icon_name' => 'Scale',
        'icon_color' => 'Red',
    ];

    private const REWARD_TWO = [
        'id' => '2',
        'name' => 'Conflagrant Sac',
        'rank' => 'MR',
        'percentage' => '30',
        'condition' => 'Investigation (Silver)',
        'stack' => '2',
        'icon_name' => 'Sac',
        'icon_color' => 'Red',
    ];

    private const BREAK_ONE = [
        'name' => 'Head',
        'flinch' => '240',
        'wound' => '480',
        'sever' => null,
        'extract' => 'red',
    ];

    private const BREAK_TWO = [
        'name' => 'Right Wing',
        'flinch' => '220',
        'wound' => '220',
        'sever' => null,
        'extract' => 'white',
    ];

    private const HITZONE_ONE = [
        'name' => 'Head',
        'cut' => '65',
        'impact' => '70',
        'shot' => '60',
        'fire' => '0',
        'water' => '15',
        'ice' => '15',
        'thunder' => '20',
        'dragon' => '30',
        'ko' => '100',
    ];

    private const HITZONE_TWO = [
        'name' => 'Left Wing',
        'cut' => '50',
        'impact' => '45',
        'shot' => '40',
        'fire' => '0',
        'water' => '10',
        'ice' => '10',
        'thunder' => '15',
        'dragon' => '25',
        'ko' => '0',
    ];

    /** @var array<string, mixed> */
    private array $monster;

    private MonsterShowFieldMapper $mapper;

    public function setUp(): void
    {
        parent::setUp();

        $this->monster = [
            'details' => (object) self::DETAILS,
            'habitats' => [(object) self::HABITAT],
            'rewards' => [(object) self::REWARD_ONE, (object) self::REWARD_TWO],
            'breaks' => [(object) self::BREAK_ONE, (object) self::BREAK_TWO],
            'hitZones' => [(object) self::HITZONE_ONE, (object) self::HITZONE_TWO],
        ];

        $this->mapper = new MonsterShowFieldMapper($this->monster);
    }

    public function testGetName(): void
    {
        self::assertEquals(self::DETAILS['name'], $this->mapper->getName());
    }

    public function testGetSize(): void
    {
        self::assertEquals(self::DETAILS['size'], $this->mapper->getSize());
    }

    public function testGetSpecies(): void
    {
        self::assertEquals(self::DETAILS['ecology'], $this->mapper->getSpecies());
    }

    public function testGetSpeciesReturnsNullIfEcologyNotSet(): void
    {
        $monster = $this->monster;
        $monster['details']->ecology = null;
        $mapper = new MonsterShowFieldMapper($monster);
        self::assertNull($mapper->getSpecies());
    }

    public function testGetIcon(): void
    {
        $id = self::DETAILS['id'];
        $url = url('/images/monster/' . $id . '.png');
        self::assertEquals($url, $this->mapper->getIcon());
    }

    public function testGetColour(): void
    {
        Config::set('colours.hex.red', '000000');
        self::assertEquals('#000000', $this->mapper->getColour());
    }

    public function testGetColourReturnsNullIfColourIsNull(): void
    {
        $monster = $this->monster;
        $monster['details']->colour = null;
        $mapper = new MonsterShowFieldMapper($monster);
        self::assertNull($mapper->getColour());
    }

    public function testGetColourReturnsNullIfColourNotInConfig(): void
    {
        Config::set('colours.hex.red');
        self::assertNull($this->mapper->getColour());
    }

    public function testGetDescription(): void
    {
        self::assertEquals(self::DETAILS['description'], $this->mapper->getDescription());
    }

    public function testGetTraps(): void
    {
        $traps = [
            'pitfall' => true,
            'shock' => true,
            'vine' => true,
        ];

        self::assertEquals($traps, $this->mapper->getTraps());
    }

    public function testGetAilments(): void
    {
        $ailments = [
            'roar' => true,
            'wind' => true,
            'tremor' => false,
            'defense_down' => false,
            'fire_blight' => true,
            'water_blight' => false,
            'thunder_blight' => false,
            'ice_blight' => false,
            'dragon_blight' => false,
            'blast_blight' => false,
            'regional' => false,
            'poison' => true,
            'sleep' => false,
            'paralysis' => false,
            'bleed' => false,
            'stun' => false,
            'mud' => false,
            'effluvia' => false,
        ];

        self::assertEquals($ailments, $this->mapper->getAilments());
    }

    public function testGetWeaknesses(): void
    {
        $weaknesses = [
            'fire' => 0,
            'water' => 1,
            'ice' => 1,
            'thunder' => 2,
            'dragon' => 3,
            'poison' => 1,
            'sleep' => 2,
            'paralysis' => 2,
            'blast' => 1,
            'stun' => 2,
        ];

        self::assertEquals($weaknesses, $this->mapper->getWeaknesses());
    }

    public function testGetLocations(): void
    {
        $locations = [
            [
                'location' => self::HABITAT['name'],
                'start_area' => self::HABITAT['start_area'],
                'move_area' => self::HABITAT['move_area'],
                'rest_area' => self::HABITAT['rest_area'],
            ],
        ];

        self::assertEquals($locations, $this->mapper->getLocations());
    }

    public function testGetRewards(): void
    {
        $rewards = [
            'lr' => [
                'track' => [
                    [
                        'material' => 'Rathalos Scale',
                        'url' => '',
                        'icon_url' => url('/images/items/scale/red.png'),
                        'stack' => 1,
                        'percentage' => 100,
                    ],
                ],
            ],
            'mr' => [
                'investigation_silver' => [
                    [
                        'material' => 'Conflagrant Sac',
                        'url' => '',
                        'icon_url' => url('/images/items/sac/red.png'),
                        'stack' => 2,
                        'percentage' => 30,
                    ],
                ],
            ],
        ];

        self::assertEquals($rewards, $this->mapper->getRewards());
    }

    public function testGetRewardsIconUrlNullIfFileDoesNotExist(): void
    {
        $monster = $this->monster;
        $monster['rewards'][0]->icon_name = 'DoesNotExist';
        $mapper = new MonsterShowFieldMapper($monster);
        $rewards = [
            'lr' => [
                'track' => [
                    [
                        'material' => 'Rathalos Scale',
                        'url' => '',
                        'icon_url' => null,
                        'stack' => 1,
                        'percentage' => 100,
                    ],
                ],
            ],
            'mr' => [
                'investigation_silver' => [
                    [
                        'material' => 'Conflagrant Sac',
                        'url' => '',
                        'icon_url' => url('/images/items/sac/red.png'),
                        'stack' => 2,
                        'percentage' => 30,
                    ],
                ],
            ],
        ];

        self::assertEquals($rewards, $mapper->getRewards());
    }

    public function testGetBreaks(): void
    {
        $breaks = [
            'head' => [
                [
                    'flinch' => 240,
                    'wound' => 480,
                    'sever' => 0,
                    'extract' => 'red',
                ],
            ],
            'right_wing' => [
                [
                    'flinch' => 220,
                    'wound' => 220,
                    'sever' => 0,
                    'extract' => 'white',
                ],
            ],
        ];

        self::assertEquals($breaks, $this->mapper->getBreaks());
    }

    public function testGetHitZones(): void
    {
        $hitZones = [
            'head' => [
                'cut' => 65,
                'impact' => 70,
                'shot' => 60,
                'fire' => 0,
                'water' => 15,
                'ice' => 15,
                'thunder' => 20,
                'dragon' => 30,
                'ko' => 100,
            ],
            'left_wing' => [
                'cut' => 50,
                'impact' => 45,
                'shot' => 40,
                'fire' => 0,
                'water' => 10,
                'ice' => 10,
                'thunder' => 15,
                'dragon' => 25,
                'ko' => 0,
            ],
        ];

        self::assertEquals($hitZones, $this->mapper->getHitZones());
    }
}
