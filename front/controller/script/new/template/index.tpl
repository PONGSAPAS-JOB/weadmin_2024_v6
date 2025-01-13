<section class="site-container">
    <h1>NEW</h1>

    <div style="background-image: url('../weadmin_2024_v5/uplode/core/pic-bg-20241226173518642127-1.png');"></div>
    <h1>NEW Page</h1>
    <div class="content" data-aos="fade-up">
        <div class="title">ระบบสารสนเทศที่เกี่ยวข้อง</div>
        <div class="desc">Related Information System</div>
        <img src="../weadmin_2024_v5/upload/core/Artboard – 12.png" alt="Related Information System">
    </div>
    <a class="link" href="../weadmin_2024_v5/home">
        < Home>
    </a>
    <h3>=========================================================================================</h3>
    <div class="new" style="background-color: #fff;">
        <div class="container-fluid-custom">
            <div class="row justify-content-sm-end">
                <div class="col-sm-auto">
                    <div class="filter">
                        {* Start Form Filter *}
                        <form name="form-filter" id="form-filter" method="post" action="{$ul}/{$menuActive}">
                            <div class="row no-gutters">

                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label class="visuallyhidden" for="showFilter">เลือก</label>
                                        <div class="select-wrapper">
                                            <select class="select-control" style="width: 100%;" name="ordernews"
                                                id="ordernews" onchange="submit();">
                                                <option value="DESC" {if $ordernews == 'DESC'} selected {/if}>ล่าสุด
                                                </option>
                                                <option value="ASC" {if $ordernews == 'ASC'} selected {/if}>เก่าสุด
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <h3>=========================================================================================
                                </h3>
                                <div class="col-sm-auto">
                                    <div class="block-control">
                                        <div class="form-group">
                                            <label class="visuallyhidden" for="showFilter">ค้นหา CMS</label>
                                            <input name="limit" type="hidden" value="{$limit}">
                                            <input name="keywords" type="text" class="form-control" value="{$keywords}"
                                                placeholder="ค้นหา">
                                            <button type="submit" class="btn">
                                                <span class="feather icon-search">ค้นหา</span>
                                            </button>
                                        </div>
                                        {* <input type="submit" value="submit"> *}
                                    </div>
                                </div>
                            </div>
                        </form>
                        {* End Form Filter *}
                    </div>
                </div>
            </div>

            <h2>=========================================================================================</h2>
            <div class="row" data-aos="fade-up">
                {foreach $callCmsTest as $keyCmsTest => $valueCmsTest}
                    <div class="col-lg-3 col-md-4 col-sm-6 ">

                        <div class="card">
                            <figure class="cover">
                            <img src="{$valueCmsTest['pic']|fileinclude:"pictures":{$valueCmsTest['masterkey']}:"link"}" alt="{$valueCmsTest['pic']}">
                                    
                            </figure>
                            <div class="detail">
                                <div class="title -x2 typo-lg text-primary text-limit mb-3">
                                    {$valueCmsTest["subject"]}
                                </div>
                                <p class="desc text-limit -x3">
                                    {$valueCmsTest["title"]}
                                </p>
                                <div class="row no-gutters align-items-center justify-content-between">
                                    <div class="col-auto">
                                        <div class="date text-black">
                                            {$valueCmsTest["credate"]|DateThai:'23':'en':'shot3'}
                                        </div>
                                    </div>
                                    <a href="{$ul}/new/detail/{$valueCmsTest["id"]}" class="link new-card">
                                        <div class="col-auto">
                                            <button type="button" class="btn fluid p-0">
                                                <div class="icon circle circle-border">
                                                    <span class="feather icon-arrow-right top-0">อ่านต่อ</span>
                                                </div>
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <h2>=========================================================================================</h2>
                {/foreach}
            </div>
        </div>
        <div class="pagination-wrapper">
            {if $callCmsTest->_numOfRows > 0}
                {include file="pagination.tpl" title=title}
            {/if}

        </div>
    </div>
    </div>
    </div>
</section>