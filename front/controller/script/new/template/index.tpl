<h1>NEW</h1>

<div style="background-image: url('../weadmin_2024_v5/uplode/core/pic-bg-20241226173518642127-1.png');"></div>
<h1>NEW Page</h1>
<div class="content" data-aos="fade-up">
    <div class="title">ระบบสารสนเทศที่เกี่ยวข้อง</div>
    <div class="desc">Related Information System</div>
    <img src="../weadmin_2024_v5/upload/core/Artboard – 12.png" alt="Related Information System">
</div>
<a class="link" href="../weadmin_2024_v5/home">< Home ></a>
<h3>=========================================================================================</h3>
<div class="col-md col">
            <div class="form-group">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="title typo-lg fw-bold">
                    ค้นหา
                    <div class="title typo-md">Search</div>
                  </span>
                </div>
                <div class="col">   
                  <div class="search" data-aos="fade-up">
                    <div class="input-group">
                      <div class="form-outline" style="width: 100%;">
                        <label class="visuallyhidden" for="search">Search</label>
                        <input name="keywords" type="text" id="search" class="form-control" value="{$form.keywords}" />
                      </div>
                      <button type="button" class="btn">
                        <span class="feather icon-search"></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
                        <h3>=========================================================================================</h3>
    <div class="product-block">
        <div class="container">
            <div class="category" data-aos="fade-up">
                <div class="text">{$lang['pagination']['total']} <span>{$pagination.total|number_format}</span> {$lang["list:item"]}</div>
                <div class="default-block">
                    <form action="{$ul}/{$menuActive}/{$callCmsTest->fields.gid}" name="myForm" method="GET">
                    <label class="label" for="category">{$lang["sorting:item"]}</label>
                    <select name="order" onchange="document.myForm.submit();" class="select-control style2" id="category" style="width: 100%;">
                        <option value="DESC" {if $ordernews == 'DESC'} selected {/if}>{$lang["post:last"]}</option>
                        <option value="ASC" {if $ordernews == 'ASC'} selected {/if}>{$lang["post:old"]}</option>
                    </select>
                    <form >
                </div>
            </div>
            <h2>=========================================================================================</h2>
            <div class="product-service">
                <div class="product-list" data-aos="fade-up">
                    <ul class="item-list">
                        {foreach $callCmsTest as $keycallCmsTest => $valuecallCmsTest}
                            <li class="item" data-aos="fade-up">
                                
                                    <div class="wrapper">
                                        <div class="image">
                                            <div class="cover"><img src="{$valuecallCmsTest.pic|fileinclude:'pictures':{$valuecallCmsTest.masterkey}:'link'}" alt="our project 01"></div>
                                        </div>
                                        <div class="content">
                                            <div class="title under-line text-limit">{$valuecallCmsTest.subject}</div>
                                            <div class="desc text-limit">
                                                {$valuecallCmsTest.title}
                                            </div>

                                            <div class="action">
                                            <a href="{$ul}/{$menuActive}/{$menuDetail}/{$valuecallCmsTest.id}" class="link">
                                                <div class="view-more">{$lang['system']['viewsmore']} <span><img src="{$template}/assets/img/icon/next.svg" alt="next"></span></div>
                                                </a>
                                                </div>
                                        </div>
                                    </div>
                                
                            </li>
                            <h1>=========================================================================================</h1>
                        {/foreach}
                    </ul>
                </div>
            </div>
            <div class="pagination-wrapper"> 
                {if $callCmsTest->_numOfRows > 0}
                    {include file="pagination.tpl" title=title}
                {/if}   
                {* <div class="pagination-block mt0 border-no" data-aos="fade-up">
                    <div class="row">
                        <div class="col-md-auto d-flex align-items-center">
                            <div class="pagination-label">
                                {$lang['pagination']['total']}<span> 15 </span> {$lang["list:item"]}
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="pagination">
                                <ul>
                                    <li class="pagination-prev">
                                        <a class="link" href=""><span><img src="assets/img/icon/prev-sm.svg" alt="{$lang['pagination']['prev']}"></span></a>
                                    </li>
                                    <li class="active">
                                        <a class="link" href="" title="1">1</a>
                                    </li>
                                    <li class="">
                                        <a class="link" href="" title="2">2</a>
                                    </li>
                                    <li class="">
                                        <a class="link" href="" title="3">3</a>
                                    </li>
                                    <li class="">
                                        <a class="link" href="" title="4">4</a>
                                    </li>
                                    <li class="pagination-next">
                                        <a class="link" href=""><span><img src="assets/img/icon/next-sm.svg" alt="{$lang['pagination']['next']}"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> *}
            </div>
        </div>
    </div>
</div>