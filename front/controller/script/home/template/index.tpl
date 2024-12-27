<h1>HOME</h1>

<div style="background-image: url('../weadmin_2024_v5/uplode/core/pic-bg-20241226173518642127-1.png');"></div>
<h1>HOME Page</h1>
<div class="content" data-aos="fade-up">
    <div class="title">ระบบสารสนเทศที่เกี่ยวข้อง</div>
    <div class="desc">Related Information System</div>
    <img src="../weadmin_2024_v5/upload/core/pic-bg-20241226173518642127-1.png" alt="Related Information System">
</div>

<h1>======================================================================================================</h1>
<ul>
    {foreach $callTopGraphic as $keycallTopGraphic => $valuecallTopGraphic}
        <li>{$valuecallTopGraphic.subject}</li>
        <a href="{$valuecallTopGraphic.url}">{$valuecallTopGraphic.url}</a>
        <li><img src="../weadmin_2024_v5/upload/tg/office/{$valuecallTopGraphic.pic}" alt="{$valuecallTopGraphic.pic}"></li>
        <h2>======================================================================================================</h2>
    {/foreach}
</ul>
<h1>======================================================================================================</h1>
<ul>
    {foreach $callCmsTest as $keycallCmsTest => $valuecallCmsTest}
        <li>{$valuecallCmsTest.subject}</li>
        <li>{$valuecallCmsTest.subject2}</li>
        <li><img src="../weadmin_2024_v5/upload/cms/pictures/{$valuecallCmsTest.pic}" alt="{$valuecallCmsTest.pic}"></li>
        <h2>======================================================================================================</h2>
    {/foreach}
</ul>
