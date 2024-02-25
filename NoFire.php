<?php

/**
 *  ____                           _   _  ___
 * |  _ \ _ __ ___  ___  ___ _ __ | |_| |/ (_)_ __ ___
 * | |_) | '__/ _ \/ __|/ _ \ '_ \| __| ' /| | '_ ` _ \
 * |  __/| | |  __/\__ \  __/ | | | |_| . \| | | | | | |
 * |_|   |_|  \___||___/\___|_| |_|\__|_|\_\_|_| |_| |_|
 *
 * @author       PresentKim (debe3721@gmail.com)
 * @link         https://github.com/PresentKim
 *
 * @name         NoFire
 * @api          5.0.0
 * @version      1.0.0
 * @main         kim\present\singleton\NoFire
 * @load         STARTUP
 *
 *   (\ /)
 *  ( . .) ♥
 *  c(")(")
 *
 * @noinspection PhpUnused
 */

declare(strict_types=1);

namespace kim\present\singleton;

use pocketmine\event\block\BlockBurnEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\ItemTypeIds;
use pocketmine\plugin\PluginBase;

final class NoFire extends PluginBase implements Listener{
	protected function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	/** @priority LOWEST */
	public function onPlayerInteract(PlayerInteractEvent $event) : void{
		$typeId = $event->getItem()->getTypeId();
		if($typeId === ItemTypeIds::FLINT_AND_STEEL || $typeId === ItemTypeIds::FIRE_CHARGE){
			$event->cancel();
		}
	}

	/** @priority LOWEST */
	public function onBlockBurn(BlockBurnEvent $event) : void{
		$event->cancel();
	}
}