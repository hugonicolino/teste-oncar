<?php
/** @package Oncar::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("EstoqueMap.php");

class EstoqueDAO extends Phreezable
{
	/** @var string */
	public $Veiculo;

	/** @var string */
	public $Marca;

	/** @var int */
	public $Ano;

	/** @var string */
	public $Descricao;

	/** @var enum */
	public $Vendido;

	/** @var date */
	public $Created;

	/** @var date */
	public $Updated;



}
?>