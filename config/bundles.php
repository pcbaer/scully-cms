<?php
declare (strict_types = 1);

return [
	Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],
	Symfony\Bundle\FrameworkBundle\FrameworkBundle::class                => ['all' => true],
	Symfony\Bundle\SecurityBundle\SecurityBundle::class                  => ['all' => true],
	Symfony\Bundle\TwigBundle\TwigBundle::class                          => ['all' => true],
	Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class            => ['dev' => true, 'test' => true],
	Symfony\Bundle\MonologBundle\MonologBundle::class                    => ['all' => true],
	Symfony\Bundle\DebugBundle\DebugBundle::class                        => ['dev' => true, 'test' => true],
	Symfony\Bundle\MakerBundle\MakerBundle::class                        => ['dev' => true],
];
