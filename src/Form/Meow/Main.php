<?php

declare(strict_types=1);

namespace Form\Meow;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\item\ItemFactory;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;


use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\event\player\PlayerDropItemEvent;


use Form\Meow\libs\jojoe77777\FormAPI\SimpleForm;

class Main extends PluginBase
{

    public function onEnable(): void {
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getResource("config.yml");
    }

    public function onJoin(PlayerJoinEvent $event) {
        $sender = $event->getPlayer();
        $item = ItemFactory::getInstance()->get(399, 0, 1);
        $item->setCustomName("§r§l§aSKYBLOCK MENU\n§r§e(Right-Click)");
        $sender->getInventory()->setItem(8, $item, true);
      }
  
    public function onClick(PlayerInteractEvent $event) {
        $sender = $event->getPlayer();
        $item = $event->getItem();
        if ($item->getId() === 399 && $item->getCustomName() === "§r§l§aSKYBLOCK MENU\n§r§e(Right-Click)") {
           $this->sbmenu($sender);
        }
      }

      public function onTransaction(InventoryTransactionEvent $event) {
        $transaction = $event->getTransaction();
        foreach ($transaction->getActions() as $action) {
          $item = $action->getSourceItem();
          $source = $transaction->getSource();
          if ($source instanceof Player && $item->getId() === 399 && $item->getCustomName() === "§r§l§aSKYBLOCK MENU\n§r§e(Right-Click)") {
            $event->cancel();
          }
        }
      }
    
    public function sbmenu($player){
        $form = new SimpleForm(function(Player $player, int $data = null){
            if($data === null){
                return true;
            }

            switch($data){
                    case 0:

                     $this->getServer()->dispatchCommand($player, "skyblock");

                     break;


                   case 1:
                    $this->getServer()->dispatchCommand($player, "recipes");
                    break;
                  

                   case 2:
                     $this->getServer()->dispatchCommand($player, "skills");
                   break;
                   

                   case 3:
                     $this->getServer()->dispatchCommand($player, "shop");
                   break;
                
                
                   case 4:
                     $this->getServer()->dispatchCommand($player, "quests");
                   break;
                
                
                   case 5:
                     $this->getServer()->dispatchCommand($player, "ceshop");
                   break;
                 
                  
                   case 6:
                     $this->getServer()->dispatchCommand($player, "ec");
                   break;
                    

                   case 7:
                     $this->getServer()->dispatchCommand($player, "pets");
                   break;


                  case 8:
 
                    $this->getServer()->dispatchCommand($player, "invcraft");

                   break;
                  

                  case 9:
                    $this->getServer()->dispatchCommand($player, "ah");
                  break;
                  

                  case 10:
                    $this->getServer()->dispatchCommand($player, "bank");
                  break;
                
                
                  case 11:
                    $this->getServer()->dispatchCommand($player, "blacksmith");
                  break;
                
                
                  case 12:
                    $this->getServer()->dispatchCommand($player, "bazaar");
                  break;
                 
                  
                  case 13:
                    $this->getServer()->dispatchCommand($player, "sbui");
                  break;


                  case 14:
                    $this->getServer()->dispatchCommand($player, "fasttravel");
                  break;
            }

        });
  $form->setTitle("§l§6SKYBLOCK MENU");
  $form->setContent("§dPlease Select The Next Menu:", 0, );
  $form->addButton("§l§eSKYBLOCK\n§l§9»» §l§3TAP TO OPEN", 0, $this->getConfig()->get("skyblockt"));
  $form->addButton("§l§eRECIPE BOOK\n§l§9»» §l§3TAP TO OPEN", 0, $this->getConfig()->get("recipiet"));
  $form->addButton("§l§eSKILLS\n§l§9»» §l§3TAP TO OPEN", 0, $this->getConfig()->get("skillt"));
  $form->addButton("§l§eSHOP\n§l§9»» §l§3TAP TO OPEN", 0, $this->getConfig()->get("shopt"));
  $form->addButton("§l§eQUESTS\n§l§9»» §l§3TAP TO OPEN", 0, $this->getConfig()->get("questt"));
  $form->addButton("§l§eENCHANTMENT SHOP\n§l§9»» §l§3TAP TO OPEN", 0, $this->getConfig()->get("enchantshopt"));
  $form->addButton("§l§eENDER CHEST\n§l§9»» §l§3TAP TO OPEN", 0, $this->getConfig()->get("enderchestt"))
  $form->addButton("§l§eWORK BENCH\n§l§9»» §l§3TAP TO OPEN", 0, $this->()getConfig->get("workbencht"));
  $form->addButton("§l§eAUCTION HOUSE\n§l§9»» §l§3TAP TO OPEN", 0, $this->()getConfig->get("aht"));
  $form->addButton("§l§eBANK\n§l§9»» §l§3TAP TO OPEN", 0, $this->getConfig()->get("bankt"));
  $form->addButton("§l§eBAZAAR\n§l§9»» §l§3TAP TO OPEN", 0, $this->getConfig()->get("bazaartt"));
  $form->addButton("§l§eTRAVEL ISLAND\n§l§9»» §l§3TAP TO OPEN", 0, $this->getConfig->get("Travelislandt"));
  $form->addButton("§l§eFAST TRAVEL\n§l§9»» §l§3TAP", 0, $this->getConfig()->get("fasttravelt")); 
        return $form;
    }

}
