<?if(isset($data['ScriptLoaded'])){?>
<div align=center>
<?if($post['action']=='view'){?>

<?if($data['Pages']){?><table class=frame width=100% border=0 cellspacing=1 cellpadding=4><tr><td class=capc><?$count=count($data['Pages']);for($i=0; $i<$count; $i++){?><?if($data['Pages'][$i]==$post['StartPage']){?><?=$i+1?><?}else{?><a href="shopcategories.htm?action=<?=$post['action']?>&cid=<?=$post['cid']?>&page=<?=$data['Pages'][$i]?>"><?=$i+1?></a><?}?><?if($i<$count-1)echo(" | ");}?></td></tr></table><br><?}?>

<table class=frame width=100% border=0 cellspacing=1 cellpadding=2>
<tr><td class=capl colspan=5><?=get_categories_tree($post["cid"])?></td></tr>
<tr><td class=capc width=25%>CATEGORY</td><td class=capc width=1%>SUBCATEGORIES</td><td class=capc width=1%>SHOPS</td><td class=capc width=59%>DESCRIPTION</td><td class=capc width=15%>ACTION</td></tr>

<?foreach($data['CategoriesList'] as $key=>$value){$bgcolor=$key%2?'#EEEEEE':'#E7E7E7'?><tr bgcolor=<?=$bgcolor?> onmouseover="setPointer(this,<?=$key?>,'over','<?=$bgcolor?>','#CCFFCC','#FFCC99')" onmouseout="setPointer(this,<?=$key?>,'out','<?=$bgcolor?>','#CCFFCC','#FFCC99')" onmousedown="setPointer(this,<?=$key?>,'click','<?=$bgcolor?>','#CCFFCC','#FFCC99')"><td align=right valign=top><a href="shopcategories.htm?cid=<?=$value['id']?>&action=view"><?=$value['name']?></a></td><td valign=top align=center>(<?=($value['subcategories'])?>)</td><td valign=top align=center>(<?=($value['items'])?>)</td><td valign=top><?=$value['description']?></td>
<td align=center valign=top nowrap><a href="shopcategories.htm?cid=<?=$value['id']?>&action=view">VIEW</a>|<a href="shopcategories.htm?cid=<?=$value['id']?>&action=viewitems">ITEMS</a>|<a href="shopcategories.htm?updateid=<?=$value['id']?>&cid=<?=$post['cid']?>&action=update&page=<?=$post['StartPage']?>">EDIT</a>
<?if($value['candelete']){?><br><a href="shopcategories.htm?updateid=<?=$value['id']?>&cid=<?=$post['cid']?>&action=delete&page=<?=$post['StartPage']?>" onclick="return cfmform()">DELETE</a><?}?></td></tr><?}?></table>

<br/><form method=post>
<input type=hidden name=action value="update">
<input type=hidden name=cid value="<?=$post['cid']?>">
<input type=hidden name=page value="<?=$post['StartPage']?>">
<input type=submit class=submit name=add value="ADD NEW CATEGORY">
</form>

<?if($data['Pages']){?><br><table class=frame width=100% border=0 cellspacing=1 cellpadding=4><tr><td class=capc><?$count=count($data['Pages']);for($i=0; $i<$count; $i++){?><?if($data['Pages'][$i]==$post['StartPage']){?><?=$i+1?><?}else{?><a href="shopcategories.htm?action=<?=$post['action']?>&cid=<?=$post['cid']?>&page=<?=$data['Pages'][$i]?>"><?=$i+1?></a><?}?><?if($i<$count-1)echo(" | ");}?></td></tr></table><?}?>

<?}?>

<?if($post['action']=='update'){?>
<br/><form method=post name=addcat>
<input type=hidden name=action value="update">
<input type=hidden name=cid value="<?=$post['cid']?>">
<input type=hidden name=updateid value="<?=$post['updateid']?>">
<input type=hidden name=page value="<?=$post['StartPage']?>">

<table border="0" cellspacing="1" cellpadding="2" width="480" class=frame>
<tr>
  <td class=capl colspan="2"><? if ($post['updateid']) {?>UPDATE<?} else {?>ADD NEW<?}?> CATEGORY</td>
</tr>
<tr>
  <td class=field nowrap>Category name (required):</td>
  <td class=field nowrap style="text-align:left"><input type="text" name="categoryname" value="<?=(($post['updateid'])?$post['categorytoupdate']['name']:"")?>" style="width:250px" /></td>
</tr>
<tr>
  <td class=field nowrap>Description:</td>
  <td class=field nowrap style="text-align:left"><textarea rows="4" name="categorydescription" style="width:250px"><?=(($post['updateid'])?$post['categorytoupdate']['description']:"")?></textarea></td>
</tr>
<tr><td align="center" colspan="2" class=capl><input type="submit" class=submit name="srchbtn" value="<? if ($post['updateid']) {?>UPDATE<?} else {?>ADD NEW<?}?>" />&nbsp;&nbsp;&nbsp;<input type="button" class=submit name="bckbtn" value="BACK" onclick='document.forms.addcat.elements.action.value="view"; document.forms.addcat.submit();return false;' /></td></tr>
</table></form>

<?}?>


<?if($post['action']=='viewitems'){?>

<?if($data['Pages']){?><table class=frame width=100% border=0 cellspacing=1 cellpadding=4><tr><td class=capc><?$count=count($data['Pages']);for($i=0; $i<$count; $i++){?><?if($data['Pages'][$i]==$post['StartPage']){?><?=$i+1?><?}else{?><a href="shopcategories.htm?action=<?=$post['action']?>&cid=<?=$post['cid']?>&page=<?=$data['Pages'][$i]?>"><?=$i+1?></a><?}?><?if($i<$count-1)echo(" | ");}?></td></tr></table><br><?}?>

<table class=frame width=100% border=0 cellspacing=1 cellpadding=2>
<tr><td class=capl colspan=4><?=get_categories_tree($post["cid"])?></td></tr>
<tr><td class=capc width=20%>NAME</td><td class=capc width=30%>URL</td><td class=capc width=50%>DESCRIPTION</td><td class=capc width=1%>ACTION</td></tr>

<?foreach($data['ItemsList'] as $key=>$value){$bgcolor=$key%2?'#EEEEEE':'#E7E7E7'?><tr bgcolor=<?=$bgcolor?> onmouseover="setPointer(this,<?=$key?>,'over','<?=$bgcolor?>','#CCFFCC','#FFCC99')" onmouseout="setPointer(this,<?=$key?>,'out','<?=$bgcolor?>','#CCFFCC','#FFCC99')" onmousedown="setPointer(this,<?=$key?>,'click','<?=$bgcolor?>','#CCFFCC','#FFCC99')"><td align=right valign=top><?=$value['name']?></td><td valign=top><a href='<?=$value['url']?>' target='_blank'><?=$value['url']?></a></td><td valign=top><?=$value['description']?></td>
<td align=center valign=top nowrap><a href="shopcategories.htm?updateid=<?=$value['id']?>&cid=<?=$post['cid']?>&action=updateitem&page=<?=$post['StartPage']?>">EDIT</a><?if($value['candelete']){?><br><a href="shopcategories.htm?itemid=<?=$value['id']?>&cid=<?=$post['cid']?>&action=deleteitem&page=<?=$post['StartPage']?>" onclick="return cfmform()">DELETE</a><?}?></td></tr><?}?></table>

<br/><form method=post style='display:inline'>
<input type=hidden name=action value="updateitem">
<input type=hidden name=cid value="<?=$post['cid']?>">
<input type=submit class=submit name=add value="ADD NEW ITEM">
</form>&nbsp;&nbsp;&nbsp;<form method=post style='display:inline'>
<input type=hidden name=action value="view">
<input type=hidden name=cid value="<?=get_category_parent($post['cid'])?>">
<input type=submit class=submit name=add value="BACK TO CATEGORIES">
</form><br/>

<?if($data['Pages']){?><br><table class=frame width=100% border=0 cellspacing=1 cellpadding=4><tr><td class=capc><?$count=count($data['Pages']);for($i=0; $i<$count; $i++){?><?if($data['Pages'][$i]==$post['StartPage']){?><?=$i+1?><?}else{?><a href="shopcategories.htm?action=<?=$post['action']?>&cid=<?=$post['cid']?>&page=<?=$data['Pages'][$i]?>"><?=$i+1?></a><?}?><?if($i<$count-1)echo(" | ");}?></td></tr></table><?}?>

<?}?>



<?if($post['action']=='updateitem'){?>
<br/><form method=post name=additem>
<input type=hidden name=action value="updateitem">
<input type=hidden name=cid value="<?=$post['cid']?>">
<input type=hidden name=updateid value="<?=$post['updateid']?>">
<input type=hidden name=page value="<?=$post['StartPage']?>">

<table border="0" cellspacing="1" cellpadding="2" width="480" class=frame>
<tr>
  <td class=capl colspan="2"><? if ($post['updateid']) {?>UPDATE<?} else {?>ADD NEW<?}?> SHOP ITEM</td>
</tr>
<tr>
  <td class=field nowrap>Shop name (required):</td>
  <td class=field nowrap style="text-align:left"><input type="text" name="shopname" value="<?=(($post['updateid'])?$post['itemtoupdate']['name']:"")?>" style="width:250px" /></td>
</tr>
<tr>
  <td class=field nowrap>URL (required):</td>
  <td class=field nowrap style="text-align:left"><input type="text" name="shopurl" value="<?=(($post['updateid'])?$post['itemtoupdate']['url']:"")?>" style="width:250px" /></td>
</tr>
<tr>
  <td class=field nowrap>Description:</td>
  <td class=field nowrap style="text-align:left"><textarea rows="4" name="shopdescription" style="width:250px"><?=(($post['updateid'])?$post['itemtoupdate']['description']:"")?></textarea></td>
</tr>
<tr><td align="center" colspan="2" class=capl><input type="submit" class=submit name="srchbtn" value="<? if ($post['updateid']) {?>UPDATE ITEM<?} else {?>ADD NEW ITEM<?}?>" />&nbsp;&nbsp;&nbsp;<input type="button" class=submit name="bckbtn" value="BACK" onclick='document.forms.additem.elements.action.value="viewitems"; document.forms.additem.submit();return false;' /></td></tr>
</table></form>

<?}?>

<?if($post['action']=='search'){?>
<form method=post>
<input type=hidden name=action value="searchcategory">
<table border="0" cellspacing="1" cellpadding="2" width="480" class=frame>
<tr>
  <td class=capl colspan="2">CATEGORY SEARCH</td>
</tr>
<tr>
  <td class=field nowrap>Keyword:</td>
  <td class=field nowrap style="text-align:left"><input type="text" name="keyword" value="" style="width:250px" /></td>
</tr>
<tr><td align="center" colspan="2" class=capl><input type="submit" class=submit name="srchbtn" value="SEARCH" /></td></tr>
</table></form>
<br/><form method=post>
<input type=hidden name=action value="searchitem">
<table border="0" cellspacing="1" cellpadding="2" width="480" class=frame>
<tr>
  <td class=capl colspan="2">ITEM SEARCH</td>
</tr>
<tr>
  <td class=field nowrap>Keyword:</td>
  <td class=field nowrap style="text-align:left"><input type="text" name="keyword" value="" style="width:250px" /></td>
</tr>
<tr><td align="center" colspan="2" class=capl><input type="submit" class=submit name="srchbtn" value="SEARCH" /></td></tr>
</table></form>

<?}?>

<?if($post['action']=='searchcategory'){?>

<?if($data['Pages']){?><table class=frame width=100% border=0 cellspacing=1 cellpadding=4><tr><td class=capc><?$count=count($data['Pages']);for($i=0; $i<$count; $i++){?><?if($data['Pages'][$i]==$post['StartPage']){?><?=$i+1?><?}else{?><a href="shopcategories.htm?action=<?=$post['action']?>&cid=<?=$post['cid']?>&page=<?=$data['Pages'][$i]?>"><?=$i+1?></a><?}?><?if($i<$count-1)echo(" | ");}?></td></tr></table><br><?}?>

<table class=frame width=100% border=0 cellspacing=1 cellpadding=2>
<tr><td class=capl colspan=5>SEARCH FOR CATEGORIES</td></tr>
<tr><td class=capc width=25%>CATEGORY</td><td class=capc width=1%>SUBCATEGORIES</td><td class=capc width=1%>SHOPS</td><td class=capc width=59%>DESCRIPTION</td><td class=capc width=15%>ACTION</td></tr>

<?foreach($data['CategoriesList'] as $key=>$value){$bgcolor=$key%2?'#EEEEEE':'#E7E7E7'?><tr bgcolor=<?=$bgcolor?> onmouseover="setPointer(this,<?=$key?>,'over','<?=$bgcolor?>','#CCFFCC','#FFCC99')" onmouseout="setPointer(this,<?=$key?>,'out','<?=$bgcolor?>','#CCFFCC','#FFCC99')" onmousedown="setPointer(this,<?=$key?>,'click','<?=$bgcolor?>','#CCFFCC','#FFCC99')"><td align=right valign=top><a href="shopcategories.htm?cid=<?=$value['id']?>&action=view"><?=$value['name']?></a></td><td valign=top align=center>(<?=($value['subcategories'])?>)</td><td valign=top align=center>(<?=($value['items'])?>)</td><td valign=top><?=$value['description']?></td>
<td align=center valign=top nowrap><a href="shopcategories.htm?cid=<?=$value['id']?>&action=view">GO TO</a>|<a href="shopcategories.htm?cid=<?=$value['id']?>&action=viewitems">ITEMS</a></td></tr><?}?></table>

<form method=post>
<input type=hidden name=action value="search">
<input type=submit class=submit name=add value="BACK TO SEARCH">
</form><br/>

<?if($data['Pages']){?><br><table class=frame width=100% border=0 cellspacing=1 cellpadding=4><tr><td class=capc><?$count=count($data['Pages']);for($i=0; $i<$count; $i++){?><?if($data['Pages'][$i]==$post['StartPage']){?><?=$i+1?><?}else{?><a href="shopcategories.htm?action=<?=$post['action']?>&cid=<?=$post['cid']?>&page=<?=$data['Pages'][$i]?>"><?=$i+1?></a><?}?><?if($i<$count-1)echo(" | ");}?></td></tr></table><?}?>

<?}?>

<?if($post['action']=='searchitem'){?>

<?if($data['Pages']){?><table class=frame width=100% border=0 cellspacing=1 cellpadding=4><tr><td class=capc><?$count=count($data['Pages']);for($i=0; $i<$count; $i++){?><?if($data['Pages'][$i]==$post['StartPage']){?><?=$i+1?><?}else{?><a href="shopcategories.htm?action=<?=$post['action']?>&cid=<?=$post['cid']?>&page=<?=$data['Pages'][$i]?>"><?=$i+1?></a><?}?><?if($i<$count-1)echo(" | ");}?></td></tr></table><br><?}?>

<table class=frame width=100% border=0 cellspacing=1 cellpadding=2>
<tr><td class=capl colspan=4>SEARCH FOR ITEMS</td></tr>
<tr><td class=capc width=20%>NAME</td><td class=capc width=30%>URL</td><td class=capc width=50%>DESCRIPTION</td><td class=capc width=1%>ACTION</td></tr>

<?foreach($data['ItemsList'] as $key=>$value){$bgcolor=$key%2?'#EEEEEE':'#E7E7E7'?><tr bgcolor=<?=$bgcolor?> onmouseover="setPointer(this,<?=$key?>,'over','<?=$bgcolor?>','#CCFFCC','#FFCC99')" onmouseout="setPointer(this,<?=$key?>,'out','<?=$bgcolor?>','#CCFFCC','#FFCC99')" onmousedown="setPointer(this,<?=$key?>,'click','<?=$bgcolor?>','#CCFFCC','#FFCC99')"><td align=right valign=top><?=$value['name']?></td><td valign=top><a href='<?=$value['url']?>' target='_blank'><?=$value['url']?></a></td><td valign=top><?=$value['description']?></td>
<td align=center valign=top nowrap><a href="shopcategories.htm?cid=<?=$value['categoryid']?>&action=viewitems">GO TO</a></td></tr><?}?></table>

<form method=post>
<input type=hidden name=action value="search">
<input type=submit class=submit name=add value="BACK TO SEARCH">
</form><br/>

<?if($data['Pages']){?><br><table class=frame width=100% border=0 cellspacing=1 cellpadding=4><tr><td class=capc><?$count=count($data['Pages']);for($i=0; $i<$count; $i++){?><?if($data['Pages'][$i]==$post['StartPage']){?><?=$i+1?><?}else{?><a href="shopcategories.htm?action=<?=$post['action']?>&cid=<?=$post['cid']?>&page=<?=$data['Pages'][$i]?>"><?=$i+1?></a><?}?><?if($i<$count-1)echo(" | ");}?></td></tr></table><?}?>

<?}?>

</div>
<?}?>