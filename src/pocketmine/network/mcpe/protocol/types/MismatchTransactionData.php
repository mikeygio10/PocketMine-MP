<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\network\mcpe\protocol\types;

use pocketmine\network\mcpe\NetworkBinaryStream;
use pocketmine\network\mcpe\protocol\InventoryTransactionPacket;

class MismatchTransactionData extends TransactionData{

	public function getTypeId() : int{
		return InventoryTransactionPacket::TYPE_MISMATCH;
	}

	protected function decodeData(NetworkBinaryStream $stream) : void{
		if(!empty($this->actions)){
			throw new \UnexpectedValueException("Mismatch transaction type should not have any actions associated with it, but got " . count($this->actions));
		}
	}

	protected function encodeData(NetworkBinaryStream $stream) : void{

	}

	public static function new() : self{
		return new self; //no arguments
	}
}