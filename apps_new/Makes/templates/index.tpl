{%include file="header.tpl" title=foo%}

<div id="app_news_focus">
<!--左边-->
  <div id="app_news_focus_l">
    <ul>
{%section name=i max=10 loop=$news_emphasis%}
    {%if $smarty.section.i.index % 6 == 0%}  <li class="emphasis"><a href="{%$news_emphasis[i].url%}" target="_blank" class="linktitle">{%$news_emphasis[i].title%}</a></li>
    {%elseif $smarty.section.i.index % 6 == 1%}<li><a target="_self" class="title" href="gn/index.htm">[国内]</a>&nbsp;<a href="{%$news_emphasis[i].url%}" target="_blank">{%$news_emphasis[i].title%}</a></li>
    {%elseif $smarty.section.i.index % 6 == 2%}<li><a target="_self" class="title" href="sh/index.htm">[社会]</a>&nbsp;<a href="{%$news_emphasis[i].url%}" target="_blank">{%$news_emphasis[i].title%}</a></li>
    {%elseif $smarty.section.i.index % 6 == 3%}<li><a target="_self" class="title" href="gj/index.htm">[国际]</a>&nbsp;<a href="{%$news_emphasis[i].url%}" target="_blank">{%$news_emphasis[i].title%}</a></li>
    {%elseif $smarty.section.i.index % 6 == 4%}<li><a target="_self" class="title" href="yl/index.htm">[娱乐]</a>&nbsp;<a href="{%$news_emphasis[i].url%}" target="_blank">{%$news_emphasis[i].title%}</a></li>
    {%elseif $smarty.section.i.index % 6 == 5%}<li><a target="_self" class="title" href="gj/index.htm">[国际]</a>&nbsp;<a href="{%$news_emphasis[i].url%}" target="_blank">{%$news_emphasis[i].title%}</a></li>
    {%/if%}
{%/section%}
    </ul>
    <p class="top1"><b><a href="http://news.jinghua.cn/351/c/201202/14/n3632059.shtml?fm=1616">top1</a></b></p>
    <p class="top2"><b><a href="http://news.jinghua.cn/352/c/201202/14/n3632502.shtml?fm=1616">top2</a></b></p>
  </div><!--新闻焦点 结束-->
<!--右边-->
  <div id="app_news_focus_r">
    <ul s16="首页>新闻热搜词">
      <h4>新闻热搜词</h4>
      <li>
        <a href="test">国家最高科技奖</a>
        <a href="test">国家最高科技奖</a>
        <a href="test">国家最高科技奖</a>
      </li>
    </ul><!--新闻热搜词 结束-->
    <ul class="newsname">
      <h4>新闻网站</h4>
      <dl>
        <a target="_blank" class="box" href="test">人&nbsp;民&nbsp;网</a>
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
      <li><a href="test">新浪热点1</a></li>
      <li><a href="test">新浪热点</a></li>
      <li><a href="test">新浪热点</a></li>
      <li><a href="test">新浪热点</a></li>
      <li><a href="test">新浪热点</a></li>
      <li><a href="test">新浪热点</a></li>
      <li><a href="test">新浪热点</a></li>
      <li><a href="test">新浪热点8</a></li>
    </ul>
  </div><!--新浪热点 结束-->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>腾讯排行</h3><a href="http://news.qq.com/paihang.htm"> 更多>></a>
    </div>
    <ul>
      <li><a href="test">腾讯排行1</a></li>
      <li><a href="test">腾讯排行2</a></li>
      <li><a href="test">腾讯排行3</a></li>
      <li><a href="test">腾讯排行4</a></li>
      <li><a href="test">腾讯排行5</a></li>
      <li><a href="test">腾讯排行6</a></li>
      <li><a href="test">腾讯排行7</a></li>
      <li><a href="test">腾讯排行8</a></li>
    </ul>
  </div><!--腾讯排行 结束-->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>网易新闻</h3><a href="http://news.163.com/special/0001386F/rank_whole.html">更多>></a>
    </div>
    <ul>
      <li><a href="test">网易新闻1</a></li>
      <li><a href="test">网易新闻2</a></li>
      <li><a href="test">网易新闻3</a></li>
      <li><a href="test">网易新闻4</a></li>
      <li><a href="test">网易新闻5</a></li>
      <li><a href="test">网易新闻6</a></li>
      <li><a href="test">网易新闻7</a></li>
      <li><a href="test">腾讯排行8</a></li>
    </ul>
  </div><!--网易新闻 结束-->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>凤凰新闻</h3><a href="http://news.ifeng.com/toprank/hour/">更多>></a>
    </div>
    <ul>
      <li><a href="test">凤凰新闻1</a></li>
      <li><a href="test">凤凰新闻2</a></li>
      <li><a href="test">凤凰新闻3</a></li>
      <li><a href="test">凤凰新闻4</a></li>
      <li><a href="test">凤凰新闻5</a></li>
      <li><a href="test">凤凰新闻6</a></li>
      <li><a href="test">凤凰新闻7</a></li>
      <li><a href="test">凤凰新闻8</a></li>
    </ul>
  </div><!--凤凰新闻 结束-->

  <div class="app_news_con_imgbox">
    <div class="app_news_contitle">
      <h3>图片新闻</h3>
      <a href="http://news.163.com/photo/">更多>></a>
    </div>
    <p><b><a href="test">图片新闻1</a></b></p>
    <p><b><a href="test">图片新闻2</a></b></p>
    <p><b><a href="test">图片新闻3</a></b></p>
    <p><b><a href="test">图片新闻4</a></b></p>
    <p><b><a href="test">图片新闻5</a></b></p>
    <p><b><a href="test">图片新闻6</a></b></p>
    <p><b><a href="test">图片新闻7</a></b></p>
    <p><b><a href="test">图片新闻8</a></b></p>
    <p><b><a href="test">图片新闻9</a></b></p>
    <p><b><a href="test">图片新闻10</a></b></p>
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
      <li><a href="test">新浪评论1</a></li>
      <li><a href="test">新浪评论2</a></li>
      <li><a href="test">新浪评论3</a></li>
      <li><a href="test">新浪评论4</a></li>
      <li><a href="test">新浪评论5</a></li>
      <li><a href="test">新浪评论6</a></li>
      <li><a href="test">新浪评论7</a></li>
      <li><a href="test">新浪评论8</a></li>
      <li><a href="test">新浪评论9</a></li>
      <li><a href="test">新浪评论10</a></li>
    </ul>
  </div><!--新浪评论 结束-->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>腾讯话题</h3><a href="http://view.news.qq.com/">更多>></a>
    </div>
    <ul>
      <li><a href="test">腾讯话题1</a></li>
      <li><a href="test">腾讯话题2</a></li>
      <li><a href="test">腾讯话题3</a></li>
      <li><a href="test">腾讯话题4</a></li>
      <li><a href="test">腾讯话题5</a></li>
      <li><a href="test">腾讯话题6</a></li>
      <li><a href="test">腾讯话题7</a></li>
      <li><a href="test">腾讯话题8</a></li>
      <li><a href="test">腾讯话题9</a></li>
      <li><a href="test">腾讯话题10</a></li>
    </ul>
  </div><!--腾讯话题 结束-->

  <div class="app_news_con_videobox">
    <div class="app_news_contitle">
      <h3>视频新闻</h3>
      <a href="http://news.youku.com/focus/index">更多>></a>
    </div>
    <p><b><a href="test">视频新闻1</a></b></p>
    <p><b><a href="test">视频新闻2</a></b></p>
    <p><b><a href="test">视频新闻3</a></b></p>
    <p><b><a href="test">视频新闻4</a></b></p>
    <p><b><a href="test">视频新闻5</a></b></p>
    <p><b><a href="test">视频新闻6</a></b></p>
    <p><b><a href="test">视频新闻7</a></b></p>
    <p><b><a href="test">视频新闻8</a></b></p>
    <p><b><a href="test">视频新闻9</a></b></p>
    <p><b><a href="test">视频新闻10</a></b></p>
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
      <li><a href="test">互联网要闻1</a></li>
      <li><a href="test">互联网要闻2</a></li>
      <li><a href="test">互联网要闻3</a></li>
      <li><a href="test">互联网要闻4</a></li>
      <li><a href="test">互联网要闻5</a></li>
      <li><a href="test">互联网要闻6</a></li>
      <li><a href="test">互联网要闻7</a></li>
      <li><a href="test">互联网要闻8</a></li>
      <li><a href="test">互联网要闻9</a></li>
      <li><a href="test">互联网要闻10</a></li>
    </ul>
  </div><!--互联网江湖 结束 -->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>人在江湖</h3>
      <a href="http://tech.sina.com.cn/blog/internet/roll.html">更多>></a>
    </div>
    <ul>
      <li><a href="test">人在江湖1</a></li><span>陈永东</span>
      <li><a href="test">人在江湖2</a></li><span>陈永东</span>
      <li><a href="test">人在江湖3</a></li><span>陈永东</span>
      <li><a href="test">人在江湖4</a></li><span>陈永东</span>
      <li><a href="test">人在江湖5</a></li><span>陈永东</span>
      <li><a href="test">人在江湖6</a></li><span>陈永东</span>
      <li><a href="test">人在江湖7</a></li><span>陈永东</span>
      <li><a href="test">人在江湖8</a></li><span>陈永东</span>
      <li><a href="test">人在江湖9</a></li><span>陈永东</span>
      <li><a href="test">人在江湖10</a></li><span>陈永东</span>
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
      <li><a href="test">天涯论坛1</a></li>
      <li><a href="test">天涯论坛2</a></li>
      <li><a href="test">天涯论坛3</a></li>
      <li><a href="test">天涯论坛4</a></li>
      <li><a href="test">天涯论坛5</a></li>
      <li><a href="test">天涯论坛6</a></li>
      <li><a href="test">天涯论坛7</a></li>
      <li><a href="test">天涯论坛8</a></li>
      <li><a href="test">天涯论坛9</a></li>
      <li><a href="test">天涯论坛10</a></li>
    </ul>
  </div><!--天涯论坛 结束 -->

  <div class="app_news_con_box">
    <div class="app_news_contitle">
      <h3>猫扑大杂烩</h3><a href="http://dzh.mop.com/">更多>></a>
    </div>
    <ul>
      <li><a href="test">猫扑大杂烩1</a></li>
      <li><a href="test">猫扑大杂烩2</a></li>
      <li><a href="test">猫扑大杂烩3</a></li>
      <li><a href="test">猫扑大杂烩4</a></li>
      <li><a href="test">猫扑大杂烩5</a></li>
      <li><a href="test">猫扑大杂烩6</a></li>
      <li><a href="test">猫扑大杂烩7</a></li>
      <li><a href="test">猫扑大杂烩8</a></li>
      <li><a href="test">猫扑大杂烩9</a></li>
      <li><a href="test">猫扑大杂烩10</a></li>
    </ul>
  </div><!--猫扑大杂烩 结束 -->
</div><!--论坛热帖 结束 -->

{%include file="footer.tpl"%}