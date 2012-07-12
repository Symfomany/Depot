<?php

namespace Alpha\BetaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Alpha\BetaBundle\Entity\Test;
use Alpha\BetaBundle\Entity\Villes;
use Doctrine\Common\Util\Debug as Debug;

class DefaultController extends Controller {

    public function bubblesort(&$ptab, $n) {
        $i = null;
        $j = null;
        $temp = null;
//        $ch = "lion";
        for ($i = 0; $i < ($n - 1); $i++) {
            for ($j = ($i + 1); $j < $n; $j++) {
                 similar_text($ptab[$i]['nomVille'], "Pari", $percent);
                similar_text($ptab[$j]['nomVille'], "Pari", $percent2);
                if ($percent < $percent2) {
                    $temp = $ptab[$i];
                    $ptab[$i] = $ptab[$j];
                    $ptab[$j] = $temp;
                }
            }
        }
    }

    // returns the percentage of the string "similarity"
    public function str_compare($str1, $str2) {
        $count = 0;

        $str1 = ereg_replace("[^a-z]", ' ', strtolower($str1));
        while (strstr($str1, '  ')) {
            $str1 = str_replace('  ', ' ', $str1);
        }
        $str1 = explode(' ', $str1);

        $str2 = ereg_replace("[^a-z]", ' ', strtolower($str2));
        while (strstr($str2, '  ')) {
            $str2 = str_replace('  ', ' ', $str2);
        }
        $str2 = explode(' ', $str2);

        if (count($str1) < count($str2)) {
            $tmp = $str1;
            $str1 = $str2;
            $str2 = $tmp;
            unset($tmp);
        }

        for ($i = 0; $i < count($str1); $i++) {
            if (in_array($str1[$i], $str2)) {
                $count++;
            }
        }

        return $count / count($str2) * 100;
    }

    public function hexbin($str_hex) {
        $str_bin = FALSE;
        for ($i = 0; $i < strlen($str_hex); $i++) {
            $str_bin .= sprintf("%04s", decbin(hexdec($str_hex[$i])));
        }
        return $str_bin;
    }

// SimHash 
    public function Charikar_SimHash($tokens) {
        $V = array_fill(0, HASHBITS, 0);
        foreach ($tokens as $key => $value)
            for ($i = 0; $i < HASHBITS; $i++)
                if ($value["hash"][$i] == 1)
                    $V[$i] = intval($V[$i]) + intval($value["weight"]);
                else
                    $V[$i] = intval($V[$i]) - intval($value["weight"]);
        return $V;
    }

// fingerprint SimHash au format binaire
    public function SimHashfingerprint($V) {
        $fingerprint = array_fill(0, HASHBITS, 0);
        for ($i = 0; $i < HASHBITS; $i++)
            if ($V[$i] >= 0)
                $fingerprint[$i] = 1;
        return $fingerprint;
    }

    public function SimHashHamming($V1, $V2) {
        $Distancehamming = 0;
        for ($i = 0; $i < HASHBITS; $i++)
            if ($V1[$i] <> $V2[$i])
                $Distancehamming += 1;
        return $Distancehamming;
    }

    public function testHaming($ch = null, $ch2 = null) {

        // On recherche tous les mots et calcul du poids
        preg_match_all('/\b[a-z0-9]+\b/i', $ch, $words1);

        $tokens1 = Array();
        // calcul du poids de chaque token et de la clé de hashage
        foreach (array_count_values($words1[0]) as $key => $weight) {
            $tokens1[$key]["weight"] = $weight;
            $tokens1[$key]["hash"] = $this->hexbin(hash('md5', $key));
        }

        $tokens2 = Array();
        preg_match_all('/\b[a-z0-9]+\b/i', $ch2, $words2);
        foreach (array_count_values($words2[0]) as $key => $weight) {
            $tokens2[$key]["weight"] = $weight;
            $tokens2[$key]["hash"] = $this->hexbin(hash('md5', $key));
        }

        $fingerprint1 = $this->SimHashfingerprint($this->Charikar_SimHash($tokens1));
        $fingerprint2 = $this->SimHashfingerprint($this->Charikar_SimHash($tokens2));

        return $this->SimHashHamming($fingerprint1, $fingerprint2);
    }
    
    public function similar(){
        
        
        $ident = levenshtein($first, $second);

        $meta1 = metaphone($first);

        $meta2 = metaphone($second);

        if ($ident) {


            if ($meta1 == $meta2) {

            } else {

                $id = levenshtein($meta1, $meta2);
            }
        } else {

            print "Words are identical\n";
        }
    }
//    https://github.com/aferrandini/Maxmind-GeoIp/tree/master/src
//    http://www.clever-age.com/veille/blog/geolocalisation-google-vs-yahoo.html
    public function geoloc(){
        
include("geoloc/geoipcity.inc");
include("geoloc/geoipregionvars.php");

$gi = geoip_open(realpath("GeoLiteCity.dat"),GEOIP_STANDARD);

$record = geoip_record_by_addr($gi,'89.156.71.149');
$la = $record->latitude;
$lo = $record->longitude;

$url = "http://maps.google.com/maps/geo?output=json&q=".$la.",".$lo;
if($json = file_get_contents($url))
{
$informations = json_decode($json, true);
   if($informations['Status']['code']!=200)
   {
      die("Erreur");
   }
   else
   {
      echo $informations["Placemark"][0]["AddressDetails"]["Country"]["AdministrativeArea"]["SubAdministrativeArea"]["Locality"]["PostalCode"]["PostalCodeNumber"];
   }
}
else
{
   echo "Erreur";
}

exit(print_r($json));
geoip_close($gi);
    }
//SELECT nom_ville
//FROM  `villes` 
//WHERE  `nom_ville` LIKE  'Bor%'
//ORDER BY levenshtein(
// `nom_ville` ,  'Bordo'
//) ASC 
//LIMIT 0 , 10
    
//    +Tri par geoloc distance GEO()

    public function indexAction() {
//        exit(var_dump(levenshtein('Bordeaux', 'Bo')));
        similar_text('Parcieux', 'Paris', $pourcentage);
        exit($pourcentage);
        
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('BetaBundle:Villes')->getSoundEx('Pari');
        
        exit(Debug::dump($entities));

        
        echo "<br />Tri du tableau...<br /><br />";
        $this->bubblesort($entities, 8);
        echo "<br />";

        /* Affiche le tableau trié */
        for ($i = 0; $i < 8; $i++) {
            echo "Index " . $i . ", valeur : " . $entities[$i]['nomVille'] . "<br />";
        }
        die();

        $tabTri = Array();
//        for($i = 0; $i <= count($entities); $i++){
//           $city = $entities[$i]['nomVille']; 
//           $city1 = $entities[$i+1]['nomVille']; 
//           $city2 = $entities[$i+2]['nomVille']; 
//           if(similar_text($city, $city1) < similar_text($city1, $city2)){
//               $tabTri[] = $entities[$i];
//           }
//        }
        exit(Debug::dump($tabTri));

//        $em = $this->get("doctrine.orm.entity_manager");
//       $test = new Test();
//       $test->setEmail('zuzu@gmail.com');
//        $test->setNom('Yebox');
//        $test->setPrenom('Juju');
//        $em->persist($test);
//        $em->flush();
//        $my = $em->getReference('BetaBundle:Test',2);
//        exit(print_r($my->getNom()));
        return $this->render('BetaBundle:Default:index.html.twig');
    }

    /**
     * GET /users/{userId} 
     *  
     * @param string $userId 
     * @return Response 
     */
    public function testAction() {
        $user = $this->get('security.context')->getToken()->getUser();

        if ($userId == $user->getId()) {
            
        }

        $view = View::create()
                ->setStatusCode(200)
                ->setData($user);

        return $this->get('fos_rest.view_handler')->handle($view);
    }

}
