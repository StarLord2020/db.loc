<?php

class Request
{
	private $errors = []; 

	public function isPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}


	public function required($nameInput)
	{
		$inputData = $_POST[$nameInput] ?? '';
		$data = $this->clearData($inputData);

		if(empty($data))
		{
			$this->errors[$nameInput][] = 'Поле обазятельно к заполнению';
		}
	}


	public function getErrors()
	{
		return $this->errors;
	}


	public function clearData($text)
	{
        $text=trim(strip_tags($text));
        
		return $text;
	}

	public function min($inputTitle, $min)
	{
        $inputData = $_POST[$inputTitle] ?? '';
		$inputData = $this->clearData($inputData);

		if(mb_strlen($inputData)<$min)
		{
			$this->errors[$inputTitle][] = 'Минимальное количество символов '.$min;
		}
    }

	public function max($inputTitle, $max)
	{
		$inputData = $_POST[$inputTitle] ?? '';
		$inputData = $this->clearData($inputData);

		if(mb_strlen($inputData)>$max)
		{
			$this->errors[$inputTitle][] = 'Максимальное количество символов '.$max;
		}
	}
}
?>