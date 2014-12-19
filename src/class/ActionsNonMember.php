<?php

include_once 'MemberSystem.php';
include_once 'LoginSystem.php';
include_once 'ManageCar.php';

class ActionsNonMember {

    private $memSystem;
    private $logSystem;
    private $data;
    private $mCar;

    function __construct() {
        $this->memSystem = new MemberSystem();
        $this->logSystem = new LoginSystem();
        $this->mCar = new ManageCar();
    }

    function register($data) {
        if ($this->memSystem->newMember($data))
            echo '<meta http-equiv="refresh" content="0; url=index.php">';
    }

    function login($data) {
        $username = 'false';
        $this->logSystem->setData($data);
        if ($this->logSystem->checkUsername()) {
            $username = 'true';
        }

        if ($this->logSystem->login()) {
            echo '<meta http-equiv="refresh" content="0; url=index.php">';
        } else {
            echo '<meta http-equiv="refresh" content="0; url=index.php?username='.$username.'&login=false">';
        }
    }

    function chooseCar1() {
        $_SESSION['car1'] = $this->mCar->getCarById($this->data['GET']['carid']);
        echo '<meta http-equiv="refresh" content="0; url=carCompare.php">';
    }

    function chooseCar2() {
        $_SESSION['car2'] = $this->mCar->getCarById($this->data['GET']['carid']);
        echo '<meta http-equiv="refresh" content="0; url=carCompare.php">';
    }

    function chooseCarAgain() {
        unset($_SESSION['car1']);
        unset($_SESSION['car2']);
        echo '<meta http-equiv="refresh" content="0; url=carCompare.php">';
    }

    function setData($data) {
        $this->data = $data;
    }

    function process($action) {
        switch ($action) {
            case 'register':
                $this->register($this->data['POST']);
                break;
            case 'login':
                $this->login($this->data['POST']);
                break;
            case 'logout':
                $this->logout();
                break;
            case 'choosecar1':
                $this->chooseCar1();
                break;
            case 'choosecar2':
                $this->chooseCar2();
                break;
            case 'choosecaragain':
                $this->chooseCarAgain();
                break;
        }
    }

}
