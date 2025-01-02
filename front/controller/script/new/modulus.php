<?php
class HomePage {

    function callCmsTest($id = null , $gid = null, $order = 'DESC', $status = null, $form = array()){
        global $config, $db, $url;

        $language = $url->pagelang[4];
        $sql = "SELECT
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id as id,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey as masterkey,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject as subject,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject2 as subject2,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_title as title,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_htmlfilename as htmlfilename,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_pic as pic,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_url as url,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_target as target,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_credate as credate,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_gid as gid,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_description  as description,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_keywords as keywords,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_metatitle as metatitle
    
        FROM
        " . $config['cmstest']['db'] . "
        WHERE
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey = '" . $config['cmstest']['masterkey']. "' AND 
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject != '' AND 
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_status != 'Disable' AND 
         ((" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate)>=TO_DAYS(NOW())  ))
    
       
        ";

       
        if($id != null){
            $sql .= " AND " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id = '" . $id . "'";
            }
            if($gid != null){
              $sql .= " AND " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_gid = '" . $gid . "'";
            }
            if($status != null){
                $sql .= " AND " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_status = '".$status."'";
            }else{
                $sql .= " AND " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_status != 'Disable'";
            }

        if (!empty($form['keywords'])) {
                $sql .= " AND (
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject LIKE '%" . $form['keywords'] . "%' OR
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_title LIKE '%" . $form['keywords'] . "%'
                ) ";
              }
        $sql .= " ORDER  BY " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_order ".$order."";
        
        $result = $db->execute($sql);
        // print_pre($result);
        return $result;
    }


    function callCmsTestPage($id = null , $gid = null, $page = 1, $limit = 15, $order = null){
        global $config, $db, $url;
        $lang = $url->pagelang[4];
      
        if ($order == null) {
          $order = 'DESC';
        }
      
        $sql = "SELECT
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id as id,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey as masterkey,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject as subject,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_title as title,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_htmlfilename as htmlfilename,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_pic as pic,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_url as url,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_target as target,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_credate as credate,
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_gid as gid
        
        FROM
        " . $config['cmstest']['db'] . "
       WHERE
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey = '" . $config['cmstest']['masterkey'] . "' and
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_status != 'Disable' AND
    ((" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate)>=TO_DAYS(NOW())  ))
        ";
        if($id != null){
        $sql .= " AND " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id = '" . $id . "'";
        }
        if($gid != null){
        $sql .= " AND " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_gid = '" . $gid . "'";
        }
      
        $sql .= "
      ORDER  BY " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_order ".$order."
      ";
        // print_pre($sql);
        $result = $db->pageexecute($sql, $limit, $page);
        return $result;
      }

function updateViewCmsTest($id, $masterkey)
{
  global $config, $db, $url;

  $sql = "SELECT
     " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_view
    FROM
      " . $config['cmstest']['db'] . "
    WHERE
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey = '$masterkey' 
    AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id = '$id' 
    ";

  $result = $db->execute($sql);
  $view = $result->fields[0] + 1;

  $listView[$config['cmstest']['db'] . '_view'] = $view;
  $updateView = sqlupdate($listView, $config['cmstest']['db'], $config['cmstest']['db'] . "_id", "'" . $id . "'");

  return $updateView;
}

function Call_AlbumCmsTest($id)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
  
    $sql = "SELECT 
            " . $config['cma']['db'] . "." . $config['cma']['db'] . "_id                AS id,
            " . $config['cma']['db'] . "." . $config['cma']['db'] . "_contantid         AS contantid,
            " . $config['cma']['db'] . "." . $config['cma']['db'] . "_filename          AS filename,
            " . $config['cma']['db'] . "." . $config['cma']['db'] . "_name              AS name,
            " . $config['cma']['db'] . "." . $config['cma']['db'] . "_download          AS download
    FROM " . $config['cma']['db'] . "  
    WHERE 1=1 AND
    " . $config['cma']['db'] . "." . $config['cma']['db'] . "_contantid = '" . $id . "'
    ";
  
    $sql .= " ORDER BY " . $config['cma']['db'] . "." . $config['cma']['db'] . "_id ASC ";
  
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
  }
  
  function Call_FileCmsTest($id)
  {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
  
    $sql = "SELECT 
            " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_id                AS id,
            " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_contantid         AS contantid,
            " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_filename          AS filename,
            " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_name              AS name,
            " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_download          AS download,
            " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_credate          AS credate
    FROM " . $config['cmf']['db'] . "  
    WHERE 1=1 AND
    " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_contantid = '" . $id . "'
    ";
    // print_pre($sql);
    $sql .= " ORDER BY " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_id ASC ";
    $result = $db->execute($sql);
    return $result;
  }

}
