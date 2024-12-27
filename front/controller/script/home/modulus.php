<?php
class HomePage {
    function callTopGraphic($masterkey){
        global $config, $db, $url;

        $language = $url->pagelang[4];
    
        $sql = "SELECT
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_id as id,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey as masterkey,

        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_subject as subject,
        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_pic as pic,
        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_url as url,
        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_target as target 
    
        FROM
        " . $config['tgp']['db'] . "
        INNER JOIN " . $config['tgpl']['db'] . " ON " . $config['tgpl']['db'] . "_cid = " . $config['tgp']['db'] . "_id
        WHERE
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey = '".$masterkey."' AND 
        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_language = '".$language."' AND 
        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_subject != '' AND 
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_status != 'Disable' AND
        ((" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00')   OR
        (" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW())  ))
        ";
    
        $sql .= " ORDER  BY " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_order DESC ";
        
        $result = $db->execute($sql);
        print_pre($result);
        return $result;
    }

    function callCmsTest($masterkey){
        global $config, $db, $url;

        $language = $url->pagelang[4];
        $sql = "SELECT
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id as id,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey as masterkey,

        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject as subject,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject2 as subject2,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_pic as pic,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_url as url,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_target as target 
    
        FROM
        " . $config['cmstest']['db'] . "
        WHERE
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey = '".$masterkey."' AND 
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_language = '".$language."' AND 
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject != '' AND 
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_status != 'Disable' 
       
        ";
    
        $sql .= " ORDER  BY " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_order DESC ";
        
        $result = $db->execute($sql);
        print_pre($result);
        return $result;
    }
}
