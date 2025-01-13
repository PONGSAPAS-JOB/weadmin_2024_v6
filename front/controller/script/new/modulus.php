<?php
class HomePage
{

    function callCmsTest($page = 1, $limit = 13, $order = "DESC", $masterkey = null, $keywords = null)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];

        $sql = "SELECT
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id as id,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey as masterkey,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject" . $lang . " as subject,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject2" . $lang . " as subject2,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_title as title,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_title2 as title2,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_htmlfilename" . $lang . " as htmlfilename,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_htmlfilename2" . $lang . " as htmlfilename2,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_pic" . $lang . " as pic,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_pic2" . $lang . " as pic2,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_picshow as picshow,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_picshow2 as picshow2,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_credate as credate,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_credate2 as credate2,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_url as url,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_url2 as url2,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_target as target,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_target2 as target2,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_pin as pin


    FROM
    " . $config['cmstest']['db'] . "
    WHERE
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_status != 'Disable' AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject" . $lang . " != '' AND
    ((" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate)>=TO_DAYS(NOW())  ))
    ";

        if (!empty($keywords)) {
            $sql .= " AND (
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject LIKE '%" . $keywords . "%' OR
        " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_title LIKE '%" . $keywords . "%' 
        ) ";
        }

        $sql .= " ORDER  BY " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_order " . $order . " ";

        $result = $db->pageexecute($sql, $limit, $page);
        // print_pre($result);
        return $result;
    }


    function callCms($masterkey = null, $id = null, $limit = null)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];

        $sql = "SELECT
    " . $config['cmstest']['db'] . "_id as id,
    " . $config['cmstest']['db'] . "_masterkey as masterkey,
    " . $config['cmstest']['db'] . "_subject" . $lang . " as subject,
    " . $config['cmstest']['db'] . "_subject2" . $lang . " as subject2,
    " . $config['cmstest']['db'] . "_title as title,
    " . $config['cmstest']['db'] . "_htmlfilename" . $lang . " as htmlfilename,
    " . $config['cmstest']['db'] . "_htmlfilename2" . $lang . " as htmlfilename2,
    " . $config['cmstest']['db'] . "_pic" . $lang . " as pic,
    " . $config['cmstest']['db'] . "_pic2" . $lang . " as pic2,
    " . $config['cmstest']['db'] . "_picshow as picshow,
    " . $config['cmstest']['db'] . "_picshow2 as picshow2,
    " . $config['cmstest']['db'] . "_credate as credate,
    " . $config['cmstest']['db'] . "_credate2 as credate2,
    " . $config['cmstest']['db'] . "_url as url,
    " . $config['cmstest']['db'] . "_url2 as url2,
    " . $config['cmstest']['db'] . "_type as type,
    " . $config['cmstest']['db'] . "_type2 as type2,
    " . $config['cmstest']['db'] . "_filevdo as filevdo,
    " . $config['cmstest']['db'] . "_filevdo2 as filevdo2,
    " . $config['cmstest']['db'] . "_title2 as title2,
    " . $config['cmstest']['db'] . "_target as target,
    " . $config['cmstest']['db'] . "_target2 as target2,
    " . $config['cmstest']['db'] . "_view as view,
    " . $config['cmstest']['db'] . "_picshow as picshow,
    " . $config['cmstest']['db'] . "_order as ordernum,
    " . $config['cmstest']['db'] . "_picshow2 as picshow2,
    " . $config['cmstest']['db'] . "_description  as description,
    " . $config['cmstest']['db'] . "_keywords as keywords,
    " . $config['cmstest']['db'] . "_metatitle as metatitle

    FROM
    " . $config['cmstest']['db'] . " as t 
    WHERE
    " . $config['cmstest']['db'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['cmstest']['db'] . "_status != 'Disable' AND
    ((" . $config['cmstest']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cmstest']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cmstest']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cmstest']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cmstest']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cmstest']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cmstest']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cmstest']['db'] . "_edate)>=TO_DAYS(NOW())  )) ";

        ## SELECT ID
        if (!empty($id)) {
            $sql .= " AND " . $config['cmstest']['db'] . "_id = '" . $id . "' ";
        }


        ## LIMIT SETTING
        if (!empty($limit)) {
            $sql .= " ORDER BY RAND ( ) LIMIT " . $limit . " ";
        } else {
            ## ORDER BY
            $sql .= " ORDER  BY " . $config['cmstest']['db'] . "_order DESC ";
        }
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
    }

    function callCmsRelate($masterkey = null, $id = null, $limit = 4)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];

        $sql = "SELECT
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id as id,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey as masterkey,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject as subject,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_title as title,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_htmlfilename as htmlfilename,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_pic as pic,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_picshow as picshow,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_credate as credate,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_url as url,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_title as title,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_target as target,
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_pin as pin
  
  
    FROM
    " . $config['cmstest']['db'] . "
    WHERE
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey = '" . $masterkey . "' AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_status != 'Disable' AND
    ((" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_edate)>=TO_DAYS(NOW())  )) ";

        // $sql .= " AND YEAR(" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_credate) = '" . date('Y') . "' ";

        ## SELECT ID
        if (!empty($id)) {
            $sql .= " AND " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id != '" . $id . "' ";
        }


        $sql .= " ORDER BY RAND () LIMIT " . $limit . "";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
    }

    function Call_Cma($id, $table)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];

        $sql = "SELECT 
            " . $table . "." . $table . "_id AS id,
            " . $table . "." . $table . "_contantid AS contantid,
            " . $table . "." . $table . "_filename AS filename
    FROM " . $table . "  
    WHERE 1=1 AND
    " . $table . "." . $table . "_contantid = '" . $id . "'
    ";

        $sql .= " ORDER BY " . $table . "." . $table . "_id ASC ";

        $result = $db->execute($sql);
        return $result;
    }

    function Call_FileDownload($id, $table)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];

        $sql = "SELECT 
            " . $table . "." . $table . "_id AS id,
            " . $table . "." . $table . "_contantid AS contantid,
            " . $table . "." . $table . "_name AS name,
            " . $table . "." . $table . "_filename AS filename,
            " . $table . "." . $table . "_download AS download
    FROM " . $table . "  
    WHERE 1=1 AND
    " . $table . "." . $table . "_contantid = '" . $id . "'
    ";

        $sql .= " ORDER BY " . $table . "." . $table . "_id ASC ";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
    }

    function Call_Cma2($id, $table)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];

        $sql = "SELECT 
            " . $table . "." . $table . "_id AS id,
            " . $table . "." . $table . "_contantid2 AS contantid2,
            " . $table . "." . $table . "_filename2 AS filename2
    FROM " . $table . "  
    WHERE 1=1 AND
    " . $table . "." . $table . "_contantid2 = '" . $id . "'
    ";

        $sql .= " ORDER BY " . $table . "." . $table . "_id ASC ";

        $result = $db->execute($sql);
        return $result;
    }

    function Call_FileDownload2($id, $table)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];

        $sql = "SELECT 
            " . $table . "." . $table . "_id AS id,
            " . $table . "." . $table . "_contantid2 AS contantid2,
            " . $table . "." . $table . "_name AS name,
            " . $table . "." . $table . "_filename2 AS filename2,
            " . $table . "." . $table . "_download AS download
    FROM " . $table . "  
    WHERE 1=1 AND
    " . $table . "." . $table . "_contantid2 = '" . $id . "'
    ";

        $sql .= " ORDER BY " . $table . "." . $table . "_id ASC ";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
    }



    function updateView($id, $masterkey, $table)
    {
        global $config, $db, $url;

        $sql = "SELECT
        " . $table . "." . $table . "_view
        FROM
        " . $table . "
        WHERE
        " . $table . "." . $table . "_masterkey = '$masterkey' ";
        if (!empty($id)) {
            $sql .= " AND  " . $table . "." . $table . "_id = '" . $id . "' ";
        }

        $result = $db->execute($sql);
        $view = $result->fields[0] + 1;
        $listView[$table . '_view'] = $view;

        if (!empty($id)) {
            $updateView = sqlupdate($listView, $table,  $table . "_id", "'" . $id . "'");
        } else {
            // $updateView = sqlupdate($listView, $table,  $table . "_id", null);
        }

        // print_pre($result->fields[0]);


        return $updateView;
    }

    function getPreviousCms($masterkey, $id , $order) {
        global $db, $config;
        $sql = "SELECT 
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id as id,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject as subject,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey as masterkey,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_order as ordernum,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_credate as credate
                FROM " . $config['cmstest']['db'] . "
                WHERE 
                 " . $config['cmstest']['db'] . "_order < " . $order . "
                AND " . $config['cmstest']['db'] . "_masterkey = '" . $masterkey . "'
                AND " . $config['cmstest']['db'] . "_status != 'Disable'
                ORDER BY " . $config['cmstest']['db'] . "_order DESC
                LIMIT 1";

                // print_pre($sql);
        $result = $db->Execute($sql);
        return $result->fields;
    }
    
    function getNextCms($masterkey, $id, $order) {
        global $db, $config;
        $sql = "SELECT 
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id as id,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject as subject,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey as masterkey,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_order as ordernum,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_credate as credate
                FROM " . $config['cmstest']['db'] . "
                WHERE  " . $config['cmstest']['db'] . "_order > " . $order . "
                AND " . $config['cmstest']['db'] . "_masterkey = '" . $masterkey . "'
                AND " . $config['cmstest']['db'] . "_status != 'Disable'
                ORDER BY " . $config['cmstest']['db'] . "_order DESC
                LIMIT 1";

                // print_pre($sql);
        $result = $db->Execute($sql);
        return $result->fields;
    }

    function getPreviousCms2($masterkey, $id,  $order) {
        global $db, $config;
        $sql = "SELECT 
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id as id,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_order as ordernum,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject2 as subject2,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey as masterkey,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_credate2 as credate2
                FROM " . $config['cmstest']['db'] . "
                WHERE  
                 " . $config['cmstest']['db'] . "_order < " . $order . "
                AND " . $config['cmstest']['db'] . "_masterkey = '" . $masterkey . "'
                AND " . $config['cmstest']['db'] . "_status != 'Disable'
                ORDER BY " . $config['cmstest']['db'] . "_order DESC
                LIMIT 1";

                // print_pre($sql);
        $result = $db->Execute($sql);
        return $result->fields;
    }
    
    function getNextCms2($masterkey, $id,  $order) {
        global $db, $config;
        $sql = "SELECT 
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id as id,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_order as ordernum,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject2 as subject2,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey as masterkey,
                " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_credate2 as credate2
                FROM " . $config['cmstest']['db'] . "
                WHERE " . $config['cmstest']['db'] . "_order > " . $order . "
                AND " . $config['cmstest']['db'] . "_masterkey = '" . $masterkey . "'
                AND " . $config['cmstest']['db'] . "_status != 'Disable'
                ORDER BY " . $config['cmstest']['db'] . "_order DESC
                LIMIT 1";

                // print_pre($sql);
        $result = $db->Execute($sql);
        return $result->fields;
    }
}
