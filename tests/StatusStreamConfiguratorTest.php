<?php

namespace CascadeEnergy\Tests\StatusStream\Configurator;

use CascadeEnergy\StatusStream\Configurator\StatusStreamConfigurator;

class StatusStreamConfiguratorTest extends \PHPUnit_Framework_TestCase
{
    public function testIfShouldSetTheProcessIdOnTheStatusStreamObject()
    {
        $statusStream = $this->getMock('CascadeEnergy\StatusStream\StatusStreamInterface');
        $processIdProvider = $this->getMock(
            'CascadeEnergy\ExecutionEnvironment\MetaData\IdentifierProviderInterface'
        );

        $processIdProvider->expects($this->once())->method('getIdentifier')->willReturn('foo');

        $statusStream->expects($this->once())->method('setProcessId')->with('foo');

        /** @noinspection PhpParamsInspection */
        $configurator = new StatusStreamConfigurator($processIdProvider);

        /** @noinspection PhpParamsInspection */
        $configurator->configure($statusStream);
    }
}
