{%include file="header.tpl" title=foo%}

<div id="app_news_focus">
<!--左边-->
  <div id="app_news_focus_l">
    <ul>
{%section name=i max=12 loop=$tt_text%}
    {%if $smarty.section.i.index == 0%}  <li class="emphasis"><a href="{%$tt_text[i].href%}" target="_blank" class="linktitle">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 1%}<li><a target="_self" class="title" href="">[国内]</a>&nbsp;<a href="{%$tt_text[i].href%}" target="_blank">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 2%}<li><a target="_self" class="title" href="">[社会]</a>&nbsp;<a href="{%$tt_text[i].href%}" target="_blank">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 3%}<li><a target="_self" class="title" href="">[国际]</a>&nbsp;<a href="{%$tt_text[i].href%}" target="_blank">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 4%}<li><a target="_self" class="title" href="">[娱乐]</a>&nbsp;<a href="{%$tt_text[i].href%}" target="_blank">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 5%}<li><a target="_self" class="title" href="">[国际]</a>&nbsp;<a href="{%$tt_text[i].href%}" target="_blank">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 6%}<div></div><li class="emphasis"><a href="{%$tt_text[i].href%}" target="_blank" class="linktitle">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 7%}<li><a target="_self" class="title" href="">[体育]</a>&nbsp;<a href="{%$tt_text[i].href%}" target="_blank">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 8%}<li><a target="_self" class="title" href="">[国内]</a>&nbsp;<a href="{%$tt_text[i].href%}" target="_blank">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 9%}<li><a target="_self" class="title" href="">[社会]</a>&nbsp;<a href="{%$tt_text[i].href%}" target="_blank">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 10%}<li><a target="_self" class="title" href="">[娱乐]</a>&nbsp;<a href="{%$tt_text[i].href%}" target="_blank">{%$tt_text[i].text%}</a></li>
    {%elseif $smarty.section.i.index == 11%}<li><a target="_self" class="title" href="">[国际]</a>&nbsp;<a href="{%$tt_text[i].href%}" target="_blank">{%$tt_text[i].text%}</a></li>
    {%/if%}
{%/section%}
    </ul>
{%section name=i max=2 loop=$tt_photo%}
    {%if $smarty.section.i.index == 0%}<p class="top1"><a href="{%$tt_photo[i].href%}"><img src="{%$tt_photo[i].src%}" alt="{%$tt_photo[i].text%}"></a><b><a href="{%$tt_photo[i].href%}">{%$tt_photo[i].text%}</a></b></p>
    {%else%}<p class="top2"><a href="{%$tt_photo[i].href%}"><img src="{%$tt_photo[i].src%}" alt="{%$tt_photo[i].text%}"></a><b><a href="{%$tt_photo[i].href%}">{%$tt_photo[i].text%}</a></b></p>
    {%/if%}
{%/section%}
  </div><!--新闻焦点 结束-->
<!--右边-->
  <div id="app_news_focus_r">
    <ul s16="首页>新闻热搜词">
      <h4>新闻热搜词</h4>
      <li>
{%section name=i max=15 loop=$baidutop%}
<a href="{%$baidutop[i].href%}">{%$baidutop[i].text%}</a>
{%/section%}
      </li>
    </ul><!--新闻热搜词 结束-->
    <ul class="newsname">
      <h4>新闻网站</h4>
      <dl>
        <a target="_blank" class="box" href="http://news.sina.com.cn/">新浪新闻</a>
        <a target="_blank" class="box" href="http://news.163.com/">网易新闻</a>
        <a target="_blank" class="box" href="http://news.sohu.com/">搜狐新闻</a>
        <a target="_blank" class="box" href="http://news.qq.com/">腾讯新闻</a>
        <a target="_blank" class="box" href="http://www.xinhuanet.com/newscenter/index.htm">新&nbsp;华&nbsp;网</a>
        <a target="_blank" class="box" href="http://www.huanqiu.com/">环&nbsp;球&nbsp;网</a>
        <a target="_blank" class="box" href="http://news.ifeng.com/">凤凰资讯</a>
        <a target="_blank" class="box" href="http://www.chinanews.com.cn/">中国新闻</a>
        <a target="_blank" class="box" href="http://www.zaobao.com/">联合早报</a>
        <a target="_blank" class="box" href="http://news.people.com.cn/GB/index.html">人&nbsp;民&nbsp;网</a> 
      </dl>
    </ul><!--新闻网站 结束-->
  </div>
</div>

<!--重点关注 开始-->
<div class="app_news_con">
  <h2>重点关注</h2>
  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>新浪热点</h3><a href="http://news.sina.com.cn/hotnews/">更多>></a>
    </div>
    <ul>
<script type="text/javascript">
function showHot(data_arr){
  var html= '';
  data = data_arr['data'];
  for(var i in data){
    html+='<li><a href="'+data[i].url+'" target="_blank" title="'+data[i].title+'">'+data[i].title+'</a><span>&nbsp;</span></li>';
  }
  document.write(html);
}
</script> 
<script type="text/javascript" src="http://top.news.sina.com.cn/ws/GetTopDataList.php?top_type=day&top_cat=www_all&top_time=20120304&top_show_num=8&top_order=ASC&js_var=all_1_data&call_back=showHot"></script> 
    </ul>
  </div><!--新浪热点 结束-->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>腾讯排行</h3><a href="http://news.qq.com/paihang.htm"> 更多>></a>
    </div>
    <ul>
{%section name=i max=8 loop=$qqph%}
<li><a href="{%$qqph[i].href%}">{%$qqph[i].text%}</a></li>
{%/section%}
    </ul>
  </div><!--腾讯排行 结束-->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>网易新闻</h3><a href="http://news.163.com/special/0001386F/rank_whole.html">更多>></a>
    </div>
    <ul>
{%section name=i max=8 loop=$wy163%}
<li><a href="{%$wy163[i].href%}">{%$wy163[i].text%}</a></li>
{%/section%}
    </ul>
  </div><!--网易新闻 结束-->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>凤凰新闻</h3><a href="http://news.ifeng.com/toprank/hour/">更多>></a>
    </div>
    <ul>
{%section name=i max=8 loop=$ifeng%}
<li><a href="{%$ifeng[i].href%}">{%$ifeng[i].text%}</a></li>
{%/section%}
    </ul>
  </div><!--凤凰新闻 结束-->

  <div class="app_news_con_imgbox">
    <div class="app_news_contitle">
      <h3>图片新闻</h3>
      <a href="http://news.163.com/photo/">更多>></a>
    </div>
{%section name=i max=10 loop=$wyphoto%}
<p><a href="{%$wyphoto[i].href%}"><img src="{%$wyphoto[i].src%}" alt="{%$wyphoto[i].text%}"></a><b><a href="{%$wyphoto[i].href%}">{%$wyphoto[i].text%}</a></b></p>
{%/section%}
  </div><!--图片新闻 结束-->
</div><!--重点关注 结束-->

<!--今日话题 开始-->
<div class="app_news_con">
  <h2>今日话题</h2>
  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>新浪评论</h3><a href="http://news.sina.com.cn/opinion/shelun/index.html">更多>></a>
    </div>
    <ul>
  <script type="text/javascript"> 
function showContent(data_arr){
	var html= '';
	data = data_arr['data'];
	for(var i in data){
		html+='<li><a href="'+data[i].url+'" target="_blank" title="'+data[i].title+'">'+data[i].title+'</a><span>&nbsp;</span></li>';
	}
	document.write(html);
}
</script> 
<script type="text/javascript" src="http://top.news.sina.com.cn/ws/GetTopDataList.php?top_type=day&top_cat=newspl&top_time=20120304&top_show_num=10&top_order=ASC&js_var=newspl_1_data&call_back=showContent"></script> 
    </ul>
  </div><!--新浪评论 结束-->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>腾讯话题</h3><a href="http://view.news.qq.com/">更多>></a>
    </div>
    <ul>
{%section name=i max=10 loop=$qqht%}
<li><a href="{%$qqht[i].href%}">{%$qqht[i].text%}</a></li>
{%/section%}
    </ul>
  </div><!--腾讯话题 结束-->

  <div class="app_news_con_videobox">
    <div class="app_news_contitle">
      <h3>视频新闻</h3>
      <a href="http://news.youku.com/focus/index">更多>></a>
    </div>
{%section name=i max=10 loop=$ykvideo%}
<p><a href="{%$ykvideo[i].href%}"><img src="{%$ykvideo[i].src%}" alt="{%$ykvideo[i].text%}"></a><b><a href="{%$ykvideo[i].href%}">{%$ykvideo[i].text%}</a></b></p>
{%/section%}
  </div><!--视频新闻 结束-->
</div><!--今日话题 结束-->

<div class="app_news_con">
  <h2>互联网江湖</h2>
  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>互联网要闻</h3>
      <a href="http://tech.sina.com.cn/topnews/index.html">更多>></a>
    </div>
    <ul>
{%section name=i max=10 loop=$hlwyw%}
<li><a href="{%$hlwyw[i].href%}">{%$hlwyw[i].text%}</a></li>
{%/section%}
    </ul>
  </div><!--互联网江湖 结束 -->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>人在江湖</h3>
      <a href="http://tech.sina.com.cn/blog/internet/roll.html">更多>></a>
    </div>
    <ul>
{%section name=i max=10 step=2 loop=$roll%}
<li><a href="{%$roll[i].href%}">{%$roll[i].text%}</a></li>
{%/section%}
    </ul>
  </div><!--人在江湖 结束 -->
</div><!--互联网江湖 结束 -->

<div class="app_news_con">
  <h2>论坛热帖</h2>
  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>天涯论坛</h3><a href="http://www.tianya.cn/bbs/index.shtml">更多>></a>
    </div>
    <ul>
{%section name=i max=10 loop=$tybbs%}
<li><a href="{%$tybbs[i].href%}">{%$tybbs[i].text%}</a></li>
{%/section%}
    </ul>
  </div><!--天涯论坛 结束 -->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>猫扑大杂烩</h3><a href="http://dzh.mop.com/">更多>></a>
    </div>
    <ul>
{%section name=i max=10 loop=$mopdzh%}
<li><a href="{%$mopdzh[i].href%}">{%$mopdzh[i].text%}</a></li>
{%/section%}
    </ul>
  </div><!--猫扑大杂烩 结束 -->
</div><!--论坛热帖 结束 -->

{%include file="footer.tpl"%}