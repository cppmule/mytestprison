<?php
require_once("./class.mydb.php");
require_once("./config.php");

$db = new MyDb($C_MYSQL["dbhost"],$C_MYSQL["dbuser"],$C_MYSQL["dbpsw"],$C_MYSQL["dbname"]);
 
$db->execute("set names GBK");
$gamename = "";
if (isset($_GET["name"]) && $_GET["name"] != ""){
    $gamename = trim(addslashes($_GET["name"]));
}
$sql = "select gameid, smallpic, gamename, pinyin from game where gamename like '%$gamename%' limit 84";
//echo $sql;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=GBK" />
 <meta name="DESCRIPTION" content="ȥˣС��Ϸ, 4399$С��Ϸ,3366С��Ϸ">
 <meta name="keywords" content="ȥˣС��Ϸ, 4399$С��Ϸ,3366С��Ϸ,��Ϸ����,����Ϸ����,��Ϸ��ô��">
 <meta http-equiv="x-ua-compatible" content="ie=7" /> 
 <title>������� - www.qushua.com ȥˣС��Ϸ 4399������Ϸ��ѡС��Ϸ </title>
 <script src="http://res.qushua.com/js/allad.js" charset="utf-8"></script>
 <script src="http://res.qushua.com/js/base.js" charset="utf-8"></script>
 <link rel="shortcut icon" href="/favicon.ico" /> 
 <link href="http://res.qushua.com/css/style.css" rel="stylesheet" media="screen" type="text/css" />
</head>
<body>
	<div id="header"> 
    <div class="logo">
       <div class="logo_img"><a href="http://www.qushua.com" title="ȥˣС��Ϸ��������Ǽ�į"><img src="http://res.qushua.com/images/logo.png" alt="ȥˣС��Ϸ��������Ǽ�į" width="165" height="60" border="0"/></a></div>
       <div class="logo_right">
	     <div style="height:30px;">
		 <span style="color:red;float:left;margin-right:20px;">qushua.com����������������Ϸ���ģ�������Flash��Ϸ����</span> 		 
		 <span style="float:right;"><a href="javascript:;" onclick="setHome(this);return false;">��Ϊ��ҳ</a> | <a href="javascript:;" onclick="addSiteToFav();return false;">�ղ�ȥˣ</a> | <a href="http://res.qushua.com/С��Ϸ����.url">�ŵ�����</a>&nbsp;</span>

		 </div>
         <div class="search2">
         <form action="search.php" style="float:left;margin-right:10px;">
           <input type="text" class="btn2" id="name" name="name" maxlength="16" value="<?php echo $gamename;?>"> 
           <input type="submit" value="�� ��" class="btn" onclick="goSearch();">
         </form>  
         <a href="/" title="����鿴-����С��Ϸ">����С��Ϸ</a>&nbsp;&nbsp;
         <a href="/" title="����鿴-����������Ϸ">����������Ϸ</a> &nbsp;
		 </div>
	   </div>
    </div><!--End logo-->
    <div class="menu">

    <ul>
      <li><a href="/" title="��ҳ">��ҳ</a></li>
      <li><a href="/gaoxiao/" title="��ЦС��Ϸ">��Ц</span></a></li>
      <li><a href="/dongzuo/" title="����С��Ϸ">����</span></a></li>
      <li><a href="/tiyu/" title="����С��Ϸ">����</span></a></li>
      <li><a href="/sheji/" title="���С��Ϸ">���</span></a></li>
      <li><a href="/yizhi/" title="����С��Ϸ">����</span></a></li>
      <li><a href="/maoxian/" title="ð��С��Ϸ">ð��</span></a></li>
      <li><a href="/qipai/" title="����С��Ϸ">����</span></a></li>
      <li><a href="/cheyue/" title="����С��Ϸ">����</span></a></li>
      <li><a href="/zhonghe/" title="�ۺ�С��Ϸ">�ۺ�</span></a></li>
      <li><a href="/minjie/" title="����С��Ϸ">����</span></a></li>
      <li><a href="/xiuxian/" title="����С��Ϸ">����</span></a></li>
      <li><a href="/ertong/" title="��ͯС��Ϸ">��ͯ</span></a></li>
      <li><a href="/zhuangban/" title="װ��С��Ϸ">װ��</span></a></li>
      <li><a href="http://www.dyhk.net" target="_blank" title="�ŵ��ӰԺ">ӰԺ</li>
      <li><a href="http://www.4462.com" target="_blank" title="4462��ַ����">����</a></li>
    </ul></div>    
    </div><!--End header-->    <div id="header_ad" style="height:90px;"><center><script>ad_tag_top();</script></center></div>

	<div id="main">
		<div id="left" style="height:1600px;">
		  <div class="title"><h1>�������</h1></div>
		    <?php		    
		    $result = $db->queryObjectArray($sql);
		    if(!$result){
		    	$sql = "select gameid, smallpic, gamename, pinyin from game limit 84";		
		    	$result = $db->queryObjectArray($sql);    
		    }
			if($result){	
				foreach($result as $row){ 								
			?>
		    <div class="one_game">
              <a target="_blank" href="/<?php echo $row->pinyin?>/<?php echo $row->gameid?>.html" title="������<?php echo $row->gamename;?>С��Ϸ">
			  <img src="<?php echo $row->smallpic;?>" width="92" height="70" border="0" /></a>
              <a target="_blank" href="/<?php echo $row->pinyin?>/<?php echo $row->gameid?>.html"> <?php echo $row->gamename;?> </a>
            </div>
            <?php } }?>
            <div style="clear:both;"></div>            
		</div><!--end left-->
		<div id="right">
		  <div class="border4">
		    <center><script>ad_tag_right();</script></center>
		  </div> 
		  <div class="border3 mt_10">
            <div class="title"><h3>�����Ƽ�</h3></div>
			<div class="clear"></div>
		    <ul>
		      		      <li><a href="/cheyue/16892.html" title="�����ˣ-С������2">С������2</a></li> 
		      		      <li><a href="/xiuxian/25661.html" title="�����ˣ-���¿�">���¿�</a></li> 
		      		      <li><a href="/minjie/18410.html" title="�����ˣ-����һ�ٲ�">����һ�ٲ�</a></li> 
		      		      <li><a href="/sheji/5146.html" title="�����ˣ-ǹɱ����">ǹɱ����</a></li> 
		      		      <li><a href="/zhuangban/28273.html" title="�����ˣ-Ů��������װ">Ů��������װ</a></li> 
		      		      <li><a href="/yizhi/10326.html" title="�����ˣ-��������ɫ">��������ɫ</a></li> 
		      		      <li><a href="/minjie/22691.html" title="�����ˣ-��Ԫ��">��Ԫ��</a></li> 
		      		      <li><a href="/maoxian/15679.html" title="�����ˣ-������˹��ˮ��">������˹��ˮ��</a></li> 
		      		      <li><a href="/sheji/4661.html" title="�����ˣ-������ɱ2">������ɱ2</a></li> 
		      		      <li><a href="/yizhi/11651.html" title="�����ˣ-ճճ����-��������">ճճ����-��������</a></li> 
		      		      <li><a href="/cheyue/16753.html" title="�����ˣ-�����س�">�����س�</a></li> 
		      		      <li><a href="/sheji/5399.html" title="�����ˣ-����������">����������</a></li> 
		      		      <li><a href="/zhuangban/30308.html" title="�����ˣ-����Ů����ױ">����Ů����ױ</a></li> 
		      		      <li><a href="/zhuangban/29561.html" title="�����ˣ-ʱ�н��û�2">ʱ�н��û�2</a></li> 
		      		      <li><a href="/sheji/4783.html" title="�����ˣ-����½ս��">����½ս��</a></li> 
		      		      <li><a href="/sheji/5632.html" title="�����ˣ-��è��������">��è��������</a></li> 
		      		      <li><a href="/minjie/22555.html" title="�����ˣ-��Ը��">��Ը��</a></li> 
		      		      <li><a href="/xiuxian/24153.html" title="�����ˣ-�ű�������">�ű�������</a></li> 
		      		      <li><a href="/sheji/7130.html" title="�����ˣ-�ֵ�̫����">�ֵ�̫����</a></li> 
		      		      <li><a href="/zhuangban/28511.html" title="�����ˣ-������Ů��">������Ů��</a></li> 
		      		      <li><a href="/zhuangban/31589.html" title="�����ˣ-�Ͷ��ڵ�װ����">�Ͷ��ڵ�װ����</a></li> 
		      		      <li><a href="/maoxian/15890.html" title="�����ˣ-�����Խ���">�����Խ���</a></li> 
		      		      <li><a href="/minjie/20756.html" title="�����ˣ-��͵��æ">��͵��æ</a></li> 
		      		      <li><a href="/dongzuo/528.html" title="�����ˣ-��Ӱ����֮���˸�">��Ӱ����֮���˸�</a></li> 
		      		      <li><a href="/tiyu/3140.html" title="�����ˣ-�������˰�ԽҰ��">�������˰�ԽҰ��</a></li> 
		      		      <li><a href="/minjie/20963.html" title="�����ˣ-ө���ץץ��">ө���ץץ��</a></li> 
		      		      <li><a href="/xiuxian/25363.html" title="�����ˣ-���ѱ������">���ѱ������</a></li> 
		      		      <li><a href="/zhuangban/28384.html" title="�����ˣ-�߲����">�߲����</a></li> 
		      		      <li><a href="/minjie/20084.html" title="�����ˣ-����˹�Ĳ���">����˹�Ĳ���</a></li> 
		      		      <li><a href="/yizhi/14619.html" title="�����ˣ-A3MM�԰�">A3MM�԰�</a></li> 
		      		      <li><a href="/dongzuo/298.html" title="�����ˣ-�������ǳ�">�������ǳ�</a></li> 
		      		      <li><a href="/yizhi/14136.html" title="�����ˣ-�ӳ���ɫС����">�ӳ���ɫС����</a></li> 
		      			</ul>		    
		  </div>
		  <div style="clear:both;"></div>
	    </div><!--end right-->
    </div><!--end main-->
	<div class="clear"></div>	
    <div id="bottom_ad"><center><script>ad_tag_bottom();</script></center></div>    
	<div id="footer">
	  <div align="left"><div style="width:100%;" align="center"><table width="558">
	    <tr><td colspan="2" align="left">��Ʒ��Ȩ���������У��������֮���ַ������İ�Ȩ�������Ÿ�֪����վ����3����������ɾ��</td></tr>
	    <tr ><td width="103" rowspan="2" ><img src="http://res.qushua.com/images/hel.gif" /></td><td width="443" align="left" style="color:#ff6600">���Ʋ�����Ϸ���ܾ�������Ϸ ע�����ұ�����������ƭ�ϵ�.....</td></tr>
        <tr><td align="left" style="color:#ff6600"> �ʶ���Ϸ���ԣ�������Ϸ���� ������ʱ�䣬���ܽ�������.....</td></tr>
	    <tr><td colspan="2" align="left"> �������䣺1000dou#gmail.com(�뽫#�滻��@) վ��QQ:277161889 ��ICP��06009696��</td></tr>
        </table></div>    
      </div>
      <div id="site_analysis" style="display:none;"><script>stat();</script></div>
   </body>
</html>
