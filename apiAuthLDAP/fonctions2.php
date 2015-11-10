<?php
/**
 * Created by PhpStorm.
 * User: cecile
 * Date: 13/10/2015
 */

function auth($user, $password) {
    //$ldap_host = "172.16.0.150";
    $ldap_host = "llb.ac-corse.fr";
    $ldap_dn = "ou=People,dc=llb,dc=fr";
    $ldap = ldap_connect($ldap_host, 389);

    $res["login"] = "";
    $res["nom_prenom"] = "";
    $res["classe"] = "";
    $res["statut"] = "";
    $res["erreur"] = "";

    if($ldap){
        $bind = ldap_bind($ldap, "uid=".$user.",".$ldap_dn, $password);
        if($bind) {
            $search = ldap_search($ldap, "ou=People,dc=llb,dc=fr", "uid=".$user);
            $infos = ldap_get_entries($ldap, $search);

            for($i=0; $i<$infos["count"]; $i++) {
                $res["login"] = $infos[$i]["uid"][0];
                $res["nom_prenom"] = $infos[$i]["cn"][0];
            }

            $search_gr = ldap_search($ldap, "ou=Groups,dc=llb,dc=fr", "memberUid=".$user);
            $infos_gr = ldap_get_entries($ldap, $search_gr);

            for($i=0; $i<$infos_gr["count"]; $i++) {
                if ($infos_gr[$i]["cn"][0] == "Profs" ){
                    $res["statut"] =  "Enseignant";
                }

                if ($infos_gr[$i]["cn"][0] == "Eleves" ){
                    $res["statut"] =  "Etudiant";
                }

                $gr = substr($infos_gr[$i]["cn"][0],0,6);

                if ($gr == "Equipe" ) {
                    $res["classe"][$i] = $infos_gr[$i]["cn"][0];
                }

                if ($gr == "Classe" ){
                    $res["classe"] =  $infos_gr[$i]["cn"][0];
                }
            }
        }
        else{
            $res["erreur"] = "erreur";
        }
    }
    else{
        $res["erreur"] = "erreur";
    }

    return $res;
}