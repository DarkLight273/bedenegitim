<?php

/**
 * Created by DarkLight.
 */
class IcerikBotu
{
    private $site;
    private $icerikadresi;
    private $values;
    private $Temp;
    private $Yontem;

    function __construct($site, $Yontem = "file")
    {
        $this->site = $site;
        $this->icerikadresi = array();
        $this->Temp = new stdClass();
        $this->Yontem = $Yontem;
        $this->values = array();
    }

    //--------------------------------------------------------------------------------------------
    public function setSite($site)
    {
        $this->site = $site;
    }

    public function setYontem($Yontem)
    {
        $this->Yontem = $Yontem;
    }

    public function setİcerikadresi($icerikadresi)
    {
        $this->icerikadresi = $icerikadresi;
    }

    public function setValues($values)
    {
        $this->values = $values;
    }

    public function getSite()
    {
        return $this->site;
    }

    //--------------------------------------------------------------------------------------------
    private function curl($url, $post = false)
    {
        $user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; tr; rv:1.9.0.6) Gecko/2009011913 Firefox/3.0.6';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, $post ? true : false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post ? $post : false);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        $icerik = curl_exec($ch);
        curl_close($ch);
        return $icerik;
    }

    private function ara($bas, $son, $veri)
    {
        $dizi1 = explode($bas, $veri);
        $sonliste = array();
        foreach ($dizi1 as $deger) {
            $sonliste[] = explode($son, $deger)[0];
        }
        return $sonliste;
    }

    private function SiteyiCek()
    {
        switch ($this->Yontem) {
            case "curl":
                $icerik = $this->curl($this->site);
                break;
            default:
            case "file":
                $icerik = file_get_contents($this->site);
                break;
        }
        $this->Temp->icerik = $icerik;
    }

    private function verileriayikla()
    {
        $icerik = $this->Temp->icerik;
        $liste = array();
        foreach ($this->icerikadresi as $index => $value) {
            if (count($this->icerikadresi) == $index + 1) {
                $liste = $this->ara($value[0], $value[1], $icerik);
                $this->Temp->Deger = $liste;
            } else {
                $icerik = $this->ara($value[0], $value[1], $icerik)[1];
            }
        }
        if (!property_exists($this->Temp, "Deger")) {
            $this->Temp->Deger = $icerik;
        }
    }

    private function valueleriayarla()
    {
        $icerik = $this->Temp->Deger;
        $sonliste = array();
        if(is_array($icerik)) {
            foreach ($icerik as $degerr) {
                $templiste = array();
                foreach ($this->values as $deger) {
                    $templiste2 = $this->ara($deger[1], $deger[2], $degerr);
                    if (count($templiste2) == 2) {
                        $templiste[$deger[0]] = htmlspecialchars_decode($templiste2[1]);
                    }else if(count($templiste2) > 2){
                        $templiste[$deger[0]] = $templiste2;
                    }else{

                    }
                }
                if (count($templiste) != 0) {
                    $sonliste[] = $templiste;
                }
            }
        }else{
            $templiste = array();
            foreach ($this->values as $deger) {
                $templiste2 = $this->ara($deger[1], $deger[2], $icerik);
                if (count($templiste2) == 2) {
                    $templiste[$deger[0]] = htmlspecialchars_decode($templiste2[1]);
                }else if(count($templiste2 > 2)){
                    $templiste[$deger[0]] = htmlspecialchars_decode($templiste2);
                }
            }
            $sonliste = $templiste;
        }
        if(count($sonliste) == 0 && count($this->values) == 0){
            $this->Temp->SonDeger = (is_array($icerik) ? (count($icerik) == 2 ? $icerik[1] : $icerik) : $icerik);
        }else {
            $this->Temp->SonDeger = $sonliste;
        }
    }

    //--------------------------------------------------------------------------------------------
    public function calistir()
    {
        $this->SiteyiCek();
        $this->verileriayikla();
        $this->valueleriayarla();
        return $this->Temp->SonDeger;
    }
}
?>