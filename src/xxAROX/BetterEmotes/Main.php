<?php
/* Copyright (c) 2020 xxAROX. All rights reserved. */
namespace xxAROX\BetterEmotes;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;


/**
 * Class Main
 * @package xxAROX\BetterEmotes
 * @author xxAROX
 * @date 30.06.2020 - 17:17
 * @project BetterEmotes
 */
class Main extends PluginBase implements Listener{
	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function onDisable(): void{
	}
	public function onData(\pocketmine\event\server\DataPacketReceiveEvent $event): void{
		$pk = $event->getPacket();
		if ($pk instanceof \pocketmine\network\mcpe\protocol\EmotePacket) {
			\pocketmine\Server::getInstance()->broadcastPacket(\pocketmine\Server::getInstance()->getOnlinePlayers(), \pocketmine\network\mcpe\protocol\EmotePacket::create($event->getPlayer()->getId(), $pk->getEmoteId(), 1 << 0));
		}
	}
}
