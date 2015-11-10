<?php

function auth($user, $password) {
      
    //ip de l'annuaire
        $ldap_host = "172.16.0.150";
	$ldap_dn = "ou=People,dc=llb,dc=fr";
        //connexion à l'annuaire
	$ldap = ldap_connect($ldap_host, 389);
        //Variables déclarées
        $res["rank"]="";
        $res["login"] = "";
        $res["nom_prenom"] = "";
        $res["classe"] = "";
        $res["erreur"] = "";
        
        //$res["tableau"] = "";
        if($ldap){
            $bind = ldap_bind($ldap, "uid=".$user.",".$ldap_dn, $password);
            if($bind) {
                $search = ldap_search($ldap, "ou=People,dc=llb,dc=fr", "uid=".$user);
                $infos = ldap_get_entries($ldap, $search);
                
                for($i=0; $i<$infos["count"]; $i++) {
                    $res["login"] = $infos[$i]["uid"][0];
                    $res["nom_prenom"] = $infos[$i]["cn"][0];
                }
                /*$search_r = ldap_search($ldap, "cn=Profs,ou=Groups,dc=llb,dc=fr", "memberUid=".$user);
                $infos_r = ldap_get_entries($ldap, $search_r);
                
                //$res["tableau"]=$infos_r[0];
                /*if ($infos_r[0][""][0]>0){
                $res["rank"]="Professeur";}
                else{
                $res["rank"]="Eleve";}*/
                //recherche d'un utilisateur
                $search_gr = ldap_search($ldap, "ou=Groups,dc=llb,dc=fr", "memberUid=".$user);
                $infos_gr = ldap_get_entries($ldap, $search_gr);
                
                for($i=0; $i<$infos_gr["count"]; $i++) {
                    if($infos_gr[$i]["cn"][0]=="Profs"){
                        $res["rank"] = "Prof";
                    }
                    if($infos_gr[$i]["cn"][0]=="Eleves"){
                        $res["rank"]= "Eleve";
                    }
                    
                    $gr = substr($infos_gr[$i]["cn"][0],0,6);
                    
                    if ($gr == "Equipe" ){
                        $res["classe"] =  $infos_gr[$i]["cn"][0];
                        $res["erreur"] = "";
                    }
                    else{
                        $res["erreur"] = "erreur";
                    }
                    
                    //Récupération liste classe pour un élève
                    if ($gr == "Classe" ){
                        $res["classe"] =  $infos_gr[$i]["cn"][0];
                        $res["erreur"] = "";
                    }
                    else{
                        $res["erreur"] = "erreur";
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

?>