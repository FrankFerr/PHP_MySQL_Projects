<?php
    echo '<heaf><style>body,pre{font-family:Verdana}</style></head>';

    abstract class Media
    {
        protected $description;

        abstract protected function setDescription();

        public function getDescription() { return $this->description; }

        abstract public function showInfo();
    }

    class CD extends Media
    {
        private $copies;

        protected function setDescription()
        {
            $this->description = "a CD with 700MB of memory";
        }

        public function __construct()
        {
            $this->setDescription();
        }

        public function setCopiesSold($num) { $this->copies = $num; }
        public function getCopiesSold() { return $this->copies; }

        public function showInfo() { printf("CD info:<br>description: %s, copies sold: %d<br><br>",
             $this->getDescription(), $this->copies); }
    }

    class NewsPaper extends Media
    {
        private $subscribers;

        protected function setDescription()
        {
            $this->description = "a online NewsPaper with hundreds of subscribers";
        }

        public function __construct()
        {
            $this->setDescription();
        }

        public function setSubscribers($num) { $this->subscribers = $num; }
        public function getSubscribers() { return $this->subscribers; }

        public function showInfo() { printf("NewsPaper info:<br>description: %s, subscribers: %d<br><br>",
             $this->getDescription(), $this->subscribers); }
    }

    // $media = new Media() --> Errore, non si può instanziare una classe astratta
    $cd = new CD();
    $cd->setCopiesSold(30);
    $cd->showInfo();
    
    $np = new NewsPaper();
    $np->setSubscribers(500);
    $np->showInfo();
    
?>
