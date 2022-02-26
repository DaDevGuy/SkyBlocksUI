<?php

namespace Form\Meow;

use pocketmine\plugin\PluginBase;
use pocketmine\events\Listener;
use pocketmine\player\Player;
use pocketmine\Server;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use libs\jojoe77777\FormAPI\SimpleForm;
class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info("Enabled By DaDevGuy!");
    }

    public function onDisable(): void {
        $this->getLogger()->info("Plugin Disabled!");
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {

        if($command->getName() == "sbmu"){
            if($sender instanceof Player){
                $this->newSimpleForm($sender);
            } else {
                $sender->sendMessage("Run Command In-game Only");
            }
        }

        return true;
    }

    public function newSimpleForm($player){
        $form = new SimpleForm(function(Player $player, int $data = null){
            if($data === null){
                return true;
            }

            switch($data){
                case 0:
                    $player->sendMessage("Wait For Party Update");
                break;

                case 1:
                    $this->getServer()->getCommandMap()->dispatch($player, "fasttravelui");             
                break;

                case 2:
                    $this->getServer()->getCommandMap()->dispatch($player, "bank");
                break;
                
                case 3:
                    $this->getServer()->getCommandMap()->dispatch($player, "job");
                break;

                case 4:
                    $this->getServer()->getCommandMap()->dispatch($player, "shop");
                break;

                case 5:
                    $this->getServer()->getCommandMap()->dispatch($player, "is go");
                break;
            }

        });
        $form->setTitle("SkyBlock Menu");
        $form->setContent("Your SkyBlock Menu!");
        $form->addButton("Your Profile\nClick To View", "0", "textures/ui/arrow");
        $form->addButton("Fast Travel\nClick TO Open Menu", "0", "textures/ui/arrow");
        $form->addButton("Bank\nClick To Open Bank", "0", "textures/ui/arrow");
        $form->addButton("Jobs\nClick To Open Job Menu", "0", "textures/ui/arrow");
        $form->addButton("Shop\nClick To Open Shop", "0", "textures/ui/arrow");
        $form->addButton("Island\nGo To Your Island", "0", "textures/ui/arrow");
        $form->sendToPlayer($player);
        return $form;
    }

}
