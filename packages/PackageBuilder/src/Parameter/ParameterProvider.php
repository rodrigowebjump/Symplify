<?php declare(strict_types=1);

namespace Symplify\PackageBuilder\Parameter;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;

final class ParameterProvider
{
    /**
     * @var mixed[]
     */
    private $parameters = [];

    /**
     * @param Container|ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->parameters = $container->getParameterBag()
            ->all();
    }

    /**
     * @return null|mixed
     */
    public function provideParameter(string $name)
    {
        return $this->parameters[$name] ?? null;
    }

    /**
     * @param mixed $value
     */
    public function changeParameter(string $name, $value): void
    {
        $this->parameters[$name] = $value;
    }

    /**
     * @return mixed[]
     */
    public function provide(): array
    {
        return $this->parameters;
    }
}