<?php
namespace Recurly\Errors;

class ConnectionError extends \Error
{
	protected $_data;

	public function getData(): int
	{
		return $this->_data;
	}

	public function __construct(string $message, int $code = null, $data = null)
	{
		parent::__construct($message,$code);
		$this->_data = $data;
	}
}