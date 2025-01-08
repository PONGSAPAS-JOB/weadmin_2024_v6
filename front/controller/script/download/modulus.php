<?php



function downloadShow($search) {

    global $config, $db;

    $sql = "SELECT

    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id,

    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey,

    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_subject,

    " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_title,

    " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_filename,

    " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_name,

    " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_download,

    '" . $config['cmf']['db'] . "' as td

FROM

  " . $config['cmstest']['db'] . "

INNER JOIN

  " . $config['cmf']['db'] . "

ON

  " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_contantid = " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id

WHERE

" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_status != 'Disable' AND

" . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_masterkey = '".$config['cmstest']['masterkey']."'

";



if (!empty($search)) {

    $sql .= " and " . $config['cmf']['db'] . "." . $config['cmf']['db'] . "_name like '%$search%' ";

}





$sql.=" ORDER BY " . $config['cmstest']['db'] . "." . $config['cmstest']['db'] . "_id DESC ";

print_pre($sql);
    $result = $db->execute($sql);



    return $result;



}

 include_once("analyticstracking.php"); 

