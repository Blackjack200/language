<?php

declare(strict_types=1);

namespace blackjack200\language;

class BaseLang {
	/** @var string[] */
	protected array $map;

	/** @param string[] $map */
	public function __construct(array $map) {
		$this->map = $map;
	}

	/** @param string[] $param */
	public function translate(string $str, array $param = []) : string {
		$fmt = $this->map[$str];
		return self::replace($fmt, $param);
	}

	private static function replace(string $haystack, array $values) : string {
		return str_replace(
			array_map(
				static fn(string $k) : string => sprintf('{%s}', $k),
				array_keys($values)
			),
			array_values($values),
			$haystack
		);
	}
}