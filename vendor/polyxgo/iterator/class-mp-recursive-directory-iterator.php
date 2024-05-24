<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cats cannot jump here' );
}

class Mp_Recursive_Directory_Iterator extends RecursiveDirectoryIterator {

	public function __construct( $path ) {
		parent::__construct( $path );

		// Skip current and parent directory
		$this->skipdots();
	}

	#[\ReturnTypeWillChange]
	public function rewind() {
		parent::rewind();

		// Skip current and parent directory
		$this->skipdots();
	}

	#[\ReturnTypeWillChange]
	public function next() {
		parent::next();

		// Skip current and parent directory
		$this->skipdots();
	}

	/**
	 * Returns whether current entry is a directory and not '.' or '..'
	 *
	 * Explicitly set allow links flag, because RecursiveDirectoryIterator::FOLLOW_SYMLINKS
	 * is not supported by <= PHP 5.3.0
	 *
	 * @return bool
	 */
	#[\ReturnTypeWillChange]
	public function hasChildren( $allow_links = true ) {
		return parent::hasChildren( $allow_links );
	}

	protected function skipdots() {
		while ( $this->isDot() ) {
			parent::next();
		}
	}
}