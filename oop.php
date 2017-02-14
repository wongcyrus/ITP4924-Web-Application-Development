<?php
abstract class Fighter {
    private $name;
    private $hp;
    protected function __construct($name) {
        $this->setName($name);
        $this->setHp(100);
    }
    public function getName(){
        return $this->name;
    }
    private function setName($name){
        $this->name = trim(strtoupper($name));
    }
    public function getHp(){
        return $this->hp;
    }
    public function setHp($hp){
        if($hp < 0){
            $this->hp = 0;
        }else if($hp > 100){
            $this->hp = 100;
        }else{ 
            $this->hp = $hp;
        }
    }
}
class IoriYagami extends Fighter {
    public function __construct() {
        parent::__construct("IoriYagami"); //calling a superclass constructor!
    }
    public function yatagarasu() {
        echo $this->getName()." Yatagarasu 八稚女!<br/>";
    }
    public function superCombo() {
        $this->yatagarasu(); 
    }
}
class KyoKusanagi extends Fighter {
    public function __construct() {
        parent::__construct("KyoKusanagi"); //calling a superclass constructor!
    }
    public function orochinagi() {
        echo $this->getName(). "Orochinagi 大蛇薙!<br/>";
    }
    public function superCombo() {
        $this->orochinagi();
    }
}
abstract class DragonTigerFigher extends Fighter {
    protected $ragingTigerBasicSequence;
    protected function __construct($name) {
        parent::__construct($name); //calling a superclass constructor!		
    }
    public function ragingTiger() {
        echo $this->getName() . " Raging Tiger Basic Start.<br/>";
        foreach ($this->ragingTigerBasicSequence as $attack) {
            echo $this->getName() . " -> " . $attack."<br/>";
        }
        echo $this->getName() . " Raging Tiger Basic End.<br/>";
    }    
    public function haouShoukoKen() {
        echo $this->getName() . " HaouShoukoKen霸王翔吼拳!<br/>";
    }
    public function dragonFang() {	
        echo $this->getName() ." Dragon Fang!<br/>";
    }	    
}
class Robert extends DragonTigerFigher {
    function __construct() {
        parent::__construct("Robert"); 		
        $ragingTigerBasicSequence = array("Kick","Punch");
        $this->ragingTigerBasicSequence = $ragingTigerBasicSequence;
    }
    public function ragingTiger() {
        parent::ragingTiger();
        echo $this->getName() . " Raging Tiger Final Attack!<br/>";
        $this->haouShoukoKen();
    }	
    public function superCombo() {
        $this->ragingTiger();
    }
}
class Ryo extends DragonTigerFigher {
    function __construct() {
        parent::__construct("Ryo"); 		
        $ragingTigerBasicSequence = array("Punch","Kick");     	
        $this->ragingTigerBasicSequence = $ragingTigerBasicSequence;
    }
    public function ragingTiger() {
        parent::ragingTiger();
        echo $this->getName() . " Raging Tiger Final Attack!<br/>";
        $this->dragonFang();
    }	
    public function superCombo() {
        $this->ragingTiger();
    }
}
interface DeadGod {
    public function bankai();
}
trait DeadGodSuperCombo {
    public function bankai() {
        echo $this->getName() . " bankai 卍解!<br/>";
    }
}
interface Hollow {
    public function cero();
}
trait HollowSuperCombo {
    public function cero() {		
        echo $this->getName() . " cero 虚闪!<br/>";
    }
}
class Byakuya extends Fighter implements DeadGod {
    use DeadGodSuperCombo;
    function __construct() {
        parent::__construct("Byakuya");;
    }		
    public function superCombo() {
        $this->bankai();
    }
}
class Ulquiorra extends Fighter implements Hollow {
    use HollowSuperCombo;
    function __construct() {
        parent::__construct("Ulquiorra");;
    }
    public function superCombo() {
        $this->cero();
    }
}
class Ichigo extends Fighter implements DeadGod {
    use DeadGodSuperCombo;
    function __construct() {
        $arguments = func_get_args();
        if($arguments)
            parent::__construct($arguments[0]);
        else
            parent::__construct("Ichigo");
    }	
    public function superCombo() {
        $this->bankai();
    }
}
class HollowIchigo extends Ichigo implements Hollow {
    use HollowSuperCombo;
    function __construct() {
        parent::__construct("HollowIchigo");
    }	
    public function superCombo() {		
        parent::superCombo();
        $this->cero();
    }	
}
$kyoKusanagi = new KyoKusanagi();
$ioriYagami = new IoriYagami();
$robert = new Robert();
$ryo = new Ryo();
$byakuya = new Byakuya();
$ulquiorra = new Ulquiorra();
$ichigo = new Ichigo();
$hollowIchigo = new HollowIchigo();
$allFighters = array($ryo,$robert,$kyoKusanagi,$ioriYagami,$byakuya,$ulquiorra,$ichigo,$hollowIchigo);
foreach($allFighters as $fighter) {
    $fighter->superCombo(); 
}
echo "<br/>Inferface Polymorphism<br/>";
//  Polymorphism with Hollow Interface!
foreach($allFighters as $fighter) {
    if ($fighter instanceof Hollow) {		
        $fighter->cero();
    }
}
?>
