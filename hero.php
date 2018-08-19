<?php

class Person
{
  public $name;
  public $races = array();
  public $special= array();

  public function __construct()
  {
    $this->races[0] = ["Aliance" => ['Human', 'Nightelf']];
    $this->races[1] = ["Horde" => ['Orc', 'Tawren']];

    $this->special[0] = ["Human" => ['Warrior', 'Paladin', 'Rogue', 'Mage']];
    $this->special[1] = ["Orc" => ['Warrior', 'Shaman', 'Rogue', 'Warlock']];
  }
  public function choose_race($target_race)
  {
    foreach ($this->races as $pk => $race_info){
              //получение массива [[фракция]=>[рассы]]
       foreach ($race_info as $fraction=>$race){
            //получили фракцию
         foreach($race as $id => $name_race) {
            //получили рассу
           if ($name_race == $target_race){
              foreach($this->special as $id_special=>$race_special){
                  foreach($race_special as $target_special=>$post_special){
                  //выбор массива специализаций по рассе
                  }
              }
              echo($fraction.' '.$name_race."<br />");
              print_r($post_special);
           }
         }
       }
    }
  }
}

$human = new Person();
$human->choose_race('Human');
