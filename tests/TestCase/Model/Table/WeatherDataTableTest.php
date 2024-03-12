<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeatherDataTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeatherDataTable Test Case
 */
class WeatherDataTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WeatherDataTable
     */
    protected $WeatherData;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.WeatherData',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('WeatherData') ? [] : ['className' => WeatherDataTable::class];
        $this->WeatherData = $this->getTableLocator()->get('WeatherData', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->WeatherData);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\WeatherDataTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
