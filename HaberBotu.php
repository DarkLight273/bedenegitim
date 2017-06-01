<?php
/**
 * Created by DarkLight.
 */
include("IcerikBotu.php");

class TRTSPORBOT extends IcerikBotu
{
    private $sadeceyazicek;
    private $sonkachabercek;

    public function setSadeceyazicek($sadeceyazicek)
    {
        $this->sadeceyazicek = $sadeceyazicek;
    }


    public function setSonkachabercek($sonkachabercek)
    {
        $this->sonkachabercek = $sonkachabercek;
    }

    function __construct()
    {
        parent::__construct("http://www.trtspor.com/", "curl");
        $argumen = array(
            array("<div id=\"headline-nav\">", "</div>"),
            array("<span class=\"swiper-pagination-switch\">", "</span>")
        );
        $this->setİcerikadresi($argumen);
        $degerler = array(
            array("link", "<a href=\"", "\">"),
            array("resim", "<img src=\"", "\""),
            array("baslik", "alt=\"", "\"")
        );
        $this->setValues($degerler);
        $this->sonkachabercek = 0;
        $this->setSadeceyazicek = true;
    }

    public function calistir()
    {
        $liste = parent::calistir();
        $sonliste = array();
        $cekilenhaber = 0;
        foreach ($liste as $deger) {
            if (!is_string($deger['link'])) {
                continue;
            }
            if ($cekilenhaber == $this->sonkachabercek && $this->sonkachabercek != 0) {
                break;
            }
            $icerikbotu = new IcerikBotu(parent::getSite() . $deger["link"]);
            $icerikbotu->setİcerikadresi(array(
                array("<div class=\"news-detail\">", "</div>")
            ));
            $icerikbotu->setValues(array(array("haber", "<p>", "</p>")));
            $botsonuc = $icerikbotu->calistir();
            $haber = $botsonuc[0]['haber'];
            $haber1 = array();
            if ($this->sadeceyazicek) {
                foreach ($haber as $deger1) {
                    if (strpos($deger1, '<img') !== false) {
                        continue;
                    }
                    $haber1[] = $deger1;
                }
            } else {
                $haber1 = $haber;
            }
            $deger["haber"] = $haber1;
            $sonliste[] = $deger;
            $cekilenhaber++;
        }
        return $sonliste;
    }
}

class Spor7Bot extends IcerikBotu
{

    private $sadeceyazicek;
    private $sonkachabercek;

    function __construct()
    {
        parent::__construct("http://spor.haber7.com/spor", "file");
        $icerikbulucu = array(
            array("<ul class=\"slider\">", "</ul>"),
            array("<li>", "</li>")
        );
        $this->setİcerikadresi($icerikbulucu);
        $degerler = array(
            array("link", "<a href=\"", "\""),
            array("baslik", "alt=\"", "\""),
            array("resim", "<img   src=\"", "\""),
            array("resim", "data-src=\"", "\"")
        );
        $this->setValues($degerler);
    }

    public function setSadeceyazicek($sadeceyazicek)
    {
        $this->sadeceyazicek = $sadeceyazicek;
    }


    public function setSonkachabercek($sonkachabercek)
    {
        $this->sonkachabercek = $sonkachabercek;
    }

    function calistir()
    {
        $liste = parent::calistir();
        $sonliste = array();
        $cekilenhaber = 0;
        foreach ($liste as $haber) {
            if (!is_string($haber['link'])) {
                continue;
            }
            if ($cekilenhaber == $this->sonkachabercek && $this->sonkachabercek != 0) {
                break;
            }
            $haberbotu = new IcerikBotu($haber['link'], "file");
            $haberbotu->setİcerikadresi(array(
                array("<div class=\"news-content\">", "</div>")
            ));
            $haberbotu->setValues(array(array("haber", "<p style=\"text-align:start\">", "</p>"),array("haber", "<p>", "</p>")));

            $botsonuc = $haberbotu->calistir();
            if(!isset($botsonuc[0])){continue;}
            $haber1 = $botsonuc[0]["haber"];
            $haber2 = array();
            if ($this->sadeceyazicek) {
                if(is_array($haber1)){
                foreach ($haber1 as $deger1) {
                    if (strpos($deger1, '<img') !== false) {
                        continue;
                    }
                    if (strpos($deger1, 'http://') !== false){
                        continue;
                    }
                    $haber2[] = $deger1;
                }
                }
            } else {
                $haber2 = $haber1;
            }
            $haber["haber"] = $haber2;
            $sonliste[] = $haber;
            $cekilenhaber++;
        }
        return $sonliste;
    }
}
?>