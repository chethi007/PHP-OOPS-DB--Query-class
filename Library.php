<?php
class Library
{
  private $tableName;
	private $condition;
	private $parameter;
	private $query;
	private $value;
	
	public function __construct($tableName1, $parameter1, $condition1)
	{
	  	$this->tableName=$tableName1;		
		$this->parameter=$parameter1;
		$this->condition=$condition1;		
	}
	
	public function selectQuery()
	{	  
	  $this->query=mysql_query("select ".$this->parameter." from ".$this->tableName." ".$this->condition."");
	  if(!$this->query)
	  {
	     die("select from ".$this->TableName." query failed, ".mysql_error());
	  }
	  return $this->query;	  
	}
	
	public function fetchFromTable($query)
	{ 
	  $this->value=mysql_fetch_array($query);	  
	  return $this->value;
	}
	
	public function fetchRowTable($query)
	{ 
	  $this->value=mysql_fetch_row($query);	  
	  return $this->value;
	}
	
	public function countRowFromTable($query)
	{
	  $this->value=mysql_num_rows($query);
	  return $this->value;
	}
	
	public function deleteQuery()
	{	
	  $this->query=mysql_query("delete from ".$this->tableName." where ".$this->condition."");
	  if(!$this->query)
	  {
	     die("delete from ".$this->TableName." query failed, ".mysql_error());
	  }	  
	}
	
	public function insertQuery()
	{
	  $this->query=mysql_query(" insert into ".$this->tableName." values(".$this->parameter.") ");
	  if(!$this->query)
	  {
	    die("insert into ".$this->tableName." query failed, ".mysql_error());
	  }
	}
	
	public function updateQuery()
	{
	  $this->query=mysql_query(" update ".$this->tableName." set ".$this->parameter."  ".$this->condition." ");
	  if(!$this->query)
	  {
	    die("update ".$this->tableName." query failed, ".mysql_error());
	  }
	}
		
	public function changeParam($tableName1, $parameter1, $condition1)
	{
	  $this->tableName=$tableName1;
	  $this->parameter=$parameter1;
	  $this->condition=$condition1;
	}
}
?>
