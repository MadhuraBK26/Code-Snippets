<?php

class Person {
	protected $job;
	public function worksAt($position)
	{
		$this->job =  new Job($position);
	}
}