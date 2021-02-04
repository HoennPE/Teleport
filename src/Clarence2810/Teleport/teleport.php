<?php

namespace Clarence2810\Teleport;

use Frago9876543210\EasyForms\elements\Button;
use Frago9876543210\EasyForms\forms\MenuForm;
use pocketmine\{command\Command, command\CommandSender, event\Listener, Player, plugin\PluginBase,};

;

class teleport extends PluginBase implements Listener
{
    public static $cancel = [];
    public $cooldown = [];

    public function onEnable()
    {
        $this->getServer()->getpluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin by Clarence2810 has been enabled");
        $this->getLogger()->info("Contributors: princepines");

    }

    public function onDisable()
    {
        $this->getLogger()->info("Plugin by Clarence2810 has been disabled");
        $this->getLogger()->info("Contributors: princepines");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        switch ($cmd->getName()) {
            case "hub":
                if ($sender instanceof Player) {
                    $this->getScheduler()->scheduleRepeatingTask(new HubTask($this, $sender->getName()), 20);
                }
                break;
            case "potpvp":
                if ($sender instanceof Player) {
                    $this->getScheduler()->scheduleRepeatingTask(new PvPTask($this, $sender->getName()), 20);
                }
                break;
            case "facworld":
                if ($sender instanceof Player) {
                    $this->getScheduler()->scheduleRepeatingTask(new KPvPTask($this, $sender->getName()), 20);
                }
                break;
            case "factions":
                if ($sender instanceof Player) {
                    $this->getScheduler()->scheduleRepeatingTask(new FactionTask($this, $sender->getName()), 20);
                }
                break;
            case "plots":
                if ($sender instanceof Player) {
                    $this->getScheduler()->scheduleRepeatingTask(new PlotTask($this, $sender->getName()), 20);
                }
                break;
            case "shop":
                if ($sender instanceof Player) {
                    $this->getScheduler()->scheduleRepeatingTask(new ShopTask($this, $sender->getName()), 20);
                }
                break;
        }
        return true;
    }
}