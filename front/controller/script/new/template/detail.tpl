<section class="site-container">
    <div class="default-header">
        <div class="breadcrumb-block">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col">
                        <ol class="breadcrumb">
                            <li>
                                <a href="{$ul}/home" class="link" title="หน้าแรก">
                                    <span class="feather icon-home"></span>
                                    หน้าแรก/ HOME</a>
                            </li>
                            <li>
                                <a href="{$ul}/new" class="link" title="ข่าวสาร">
                                    ข่าวสารและประชาสัมพันธ์ / News & Public Relations
                                </a>
                            </li>
                            <li class="active">
                                Detail 1 / {$callCms->fields.subject}
                            </li>
                        </ol>
                    </div>
                    <div style="display: flex;">
                        <div class="col-auto">
                            <div class="back-to-previous">
                                <a href="javascript:void(0)" onclick="history.back()" title="กลับ" class="link">
                                    <span class="feather icon-arrow-left"></span>
                                    กลับ/ BACK</a>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="back-to-previous">
                                <a href="{$ul}/new/detail2/{$callCms->fields.id}" title="Detail 2" class="link"
                                    style="margin-left: 800px;">
                                    <span class="feather icon-arrow-left"></span>
                                    Detail 2 </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="default-body">
        <div class="home-content news-detail">

            {*//* -------------------------------------- CONTENT --------------------------------------------- */*}

            <div class="gallery-detail">
                <div class="container">
                    {if $call_news_album->_numOfRows gte 1}
                        <div class="gallery-detail-list" style="display: flex;">
                            <div class="slider slider-single">
                                {foreach $call_news_album as $keycall_news_album => $valuecall_news_album}
                                    <div class="item">
                                        <a href="{$valuecall_news_album.filename|fileinclude:'album':{$callCms->fields.masterkey}:'link'}"
                                            class="link" data-fancybox="gallery-detail">
                                            <div class="image">
                                                <div class="cover">
                                                    <img class="lazy" style="width: 100px; hight: 100px; display: flex;"
                                                        src="{$valuecall_news_album.filename|fileinclude:'album':{$callCms->fields.masterkey}:'link'}"
                                                        alt="img {$keycall_news_album}">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                {/foreach}
                            </div>
                        </div>
                    {/if}
                    <div class="desc mt-5">
                        <h1>1 : {$callCms->fields.subject}</h1>
                        <p>1 :{$callCms->fields.title}</p>

                    </div>
                    </br>

                    {if ($callCms->fields['url'] neq '' && $callCms->fields['url'] neq '#') || $callCms->fields.filevdo != ''}
                        <hr>
                    {/if}
                </div>
            </div>

            <div class="default-bar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="whead-addon">
                                <div class="detail-info">
                                    <ul class="item-list">
                                        <li>{$callCms->fields['credate']|DateThai:23:"en":"shot3"} </li>
                                        <li class="ml-2">
                                            {$callCms->fields['view']|number_format}
                                            <span class="feather icon-eye ml-2"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="social-block">
                                <div class="social-title">แบ่งปัน/ Shere :</div>

                                <a href="https://www.facebook.com/sharer/sharer.php?u={$fullurl}" target="_blank"
                                    title="Facebook this post">
                                    <img src="{$template}/assets/img/icon/icon-facebook-B.svg" alt="Facebook this post">
                                </a>

                                <a href="https://twitter.com/intent/tweet?url={$fullurl}" title="Twitter this post \"
                                        target="_blank" style="margin-left: 20px;">
                                        <img src="{$template}/assets/img/icon/icon-twitter-B.svg" alt="Twitter this post">
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="news" style="background-color: #aef3ff;">
                    <div class="container">
                        {*//* --------------------------------------------- DETAIL ------------------------------------------------------------ */*}

                        {if $callCms->_numOfRows gte 1}
                            {*//* start detail */*}
                            <h1>HTML 1 :{$callCms->fields.subject}</h1>
                            <div class="detail">

                                        {strip}
                                    {$callCms->fields['htmlfilename']|fileinclude:"html":{$callCms->fields['masterkey']}|callHtml}

                                        {/strip}
                            </div>
                            {*//* end detail */*}
                        {/if}
                        <hr>
                        <div class="main-slider" data-aos="fade-up">
                                    
                                        {if $callCms->fields['type'] eq 'url'}
                                    {$myUrlArray = "v="|explode:$callCms->fields['url']}
                                    {$myUrlCut = $myUrlArray[1]}
                                    {$myUrlCutArray = "&"|explode:$myUrlCut}
                                    {$myUrlCutAnd= $myUrlCutArray.0}
                                    <div class="detail-vdo">
                                        <div class="iframe-container" data-aos="fade-up">
                                            <iframe src="https://www.youtube.com/embed/{$myUrlCutAnd}" title="YouTube video player"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                        {/if}
                                        {if $callCms->fields['type'] eq 'file'}
                                    <div class="item video">
                                        <a>
                                            <div class="video-container">
                                                <video class="slide-video slide-media" width="100%" loop autoplay muted>
                                                    <source
                                                        src="{$callCms->fields['filevdo']|fileinclude:'vdo':{$callCms->fields['masterkey']}:'vdo'}"
                                                        type="video/mp4">
                                                    {* <source src="{$template}/assets/img/upload/slide-clock.ogg" type="video/ogg"> *}
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                    
                                    </a>
                                    </div>
                                
                                        {/if}
                                    
                                    </div>
                    </div>
                <hr>
                    {if $Call_FileDownload->_numOfRows gte 1}
                    <div class="document-downloads">
                        <div class="text-center" data-aos="fade-down">
                            <div class="h-title text-primary typo-topic">
                                {$lang["detail"]["download_doc"]["th"]}
                                <span class="typo-xxl text-secondary">/ </span>
                                <span class="typo-xxl"> DOCUMENT DOWNLOAD</span>
                            </div>
                        </div>
                        <div class="container">
                            <div class="download-slider" data-aos="fade-up">
                            {* {print_pre($callCms->fields)} *}
                                        {foreach $Call_FileDownload as $Key_Call_FileDownload => $Value_Call_FileDownload}
                                    {$fileinfo = $Value_Call_FileDownload['filename']|fileinclude:'file':{$callCms->fields.masterkey}|get_Icon}
                                    
                                    <div class="item">
                                        <a href="{$ul}/download/{$Value_Call_FileDownload['filename']|fileinclude:'file':{$callCms->fields['masterkey']}:'download'}&n={$Value_Call_FileDownload['name']}&t={'md_cmf'|encodeStr}"
                                            class="link report">
                                            <div class="wrapper">
                                                <div class="row align-items-center" style="margin-top: 20px;">
                                                    <div class="col-12">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <img src="{$template}/assets/img/icon/icon-downloads.svg"
                                                                    alt="icon downloads">
                                                            </div>
                                                            <div class="col">
                                                                <div class="title">
                                                                    {$Value_Call_FileDownload.name}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row align-items-center pt-3">
                                                            <div class="col">
                                                                <div class="typo-xs">ขนาด/ Size :
                                                                    {$Value_Call_FileDownload['filename']|fileinclude:'file':{$callCms->fields.masterkey}|get_IconSize}
                                                                </div>
                                                                <div class="typo-xs">ประเภทไฟล์/ Type : {$fileinfo.type}</div>
                                                                <div class="typo-xs">จำนวนดาวน์โหลด/ Download :
                                                                    {$Value_Call_FileDownload.download|number_format}</div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <span class="feather icon-download"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                        {/foreach}
                            </div>
                        </div>
                    </div>
                    {/if}
                </div>
            {* ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// *}
            <hr>
            {if $nextCms || $previousCms}
                <div class="action -back-2-previous">
                   <div class="row action-top">
                      <div class="col-auto">
                         {if $nextCms}
                            <a href="{$ul}/new/detail/{$nextCms.id}" class="btn btn-lg btn-light">
                               <span class="feather icon-chevron-left"></span>
                               ต่อไป
                            </a>
                         {/if}
                      </div>
                      <div class="col-auto">
                         {if $previousCms}
                               <a href="{$ul}/new/detail/{$previousCms.id}" class="btn btn-lg btn-light">
                                  ย้อนกลับ
                                  <span class="feather icon-chevron-right"></span>
                               </a>
                         {/if}
                      </div>
                   </div>
                </div>
             {/if}
        <hr>
        {*//* --------------------------------------------- DETAIL ------------------------------------------------------------ */*}


        {if $callCmsRelate->_numOfRows gte 1}
        <div class="text-center" data-aos="fade-down">
            <div class="h-title text-primary typo-topic">
                {$lang["detail"]["related_news"]["th"]}
                <span class="typo-xxl text-secondary">/ </span>
                <span class="typo-xxl">{$lang["detail"]["related_news"]["en"]|strtoupper}</span>
            </div>
        </div>
        <div class="slider" data-aos="fade-up">


            {foreach $callCmsRelate as $KeycallCmsRelate => $ValuecallCmsRelate}
            <div class="item">

                <div class="card">
                    <figure class="cover">
                    <img src="{$ValuecallCmsRelate['pic']|fileinclude:"pictures":{$ValuecallCmsRelate['masterkey']}:"link"}" alt="{$ValuecallCmsRelate['pic']}">
                    </figure>
                    <div class="detail">
                        <div class="title typo-xl text-primary text-limit mb-3">
                            ชื่อCMS : {$ValuecallCmsRelate.subject}
                        </div>
                        <p class="desc text-limit -x4">
                            Title : {$ValuecallCmsRelate.title}
                        </p>
                        <div class="row no-gutters align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="date">
                                    {$ValuecallCmsRelate.credate|DateThai:'23':'en':'shot3'}
                                </div>
                            </div>
                            <a href="{$ul}/new/detail/{$ValuecallCmsRelate.id}" class="link">
                                <div class="col-auto">
                                    <button type="button" class="btn fluid p-0">
                                        <div class="icon circle circle-border">
                                            <span class="feather icon-arrow-right">อ่านต่อ</span>
                                                </div>
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                {/foreach}
            </div>
        {/if}


    
    </div>

    {*//* -------------------------------------- CONTENT --------------------------------------------- */*}

    </div>
</section>