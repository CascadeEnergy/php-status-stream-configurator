<?php

namespace CascadeEnergy\StatusStream\Configurator;

use CascadeEnergy\ExecutionEnvironment\MetaData\IdentifierProviderInterface;
use CascadeEnergy\StatusStream\StatusStreamInterface;

/**
 * This class configures status stream implementations at DI time to correctly set their process ID information.
 */
class StatusStreamConfigurator
{
    /** @var IdentifierProviderInterface */
    private $processIdProvider;

    /**
     * @param IdentifierProviderInterface $processIdProvider The object that will provide process ID information
     */
    public function __construct(IdentifierProviderInterface $processIdProvider)
    {
        $this->processIdProvider = $processIdProvider;
    }

    /**
     * Configures the given status stream object with process ID information from the identifier provider
     *
     * @param StatusStreamInterface $statusStream The status stream to be configured
     */
    public function configure(StatusStreamInterface $statusStream)
    {
        $statusStream->setProcessId($this->processIdProvider->getIdentifier());
    }
}
