<?if(isset($data['ScriptLoaded'])){?>
<form method=post>
<center>
<table class=frame width=300 border=0 cellspacing=1 cellpadding=4><tr><td class=capl colspan=4>FAQ LIST</td></tr>
<tr><td class=capc>&nbsp;</td><td class=capc>ID</td><td class=capc>Q/A</td><td class=capc>SECTION</td></tr><?
		$qr1 = mysql_query("SELECT * FROM dp_faq_list ORDER BY cat");
		while ($a = mysql_fetch_object($qr1)){
?>
<tr><td class=input><?=($a->id ? "<input type=radio name=delete value=$a->id>" : "&nbsp;")?></td><td class=input><?=$a->id?></td><td class=input><TABLE cellspacing=0>
			<TR>
				<TD valign=top><b>Q: </TD>
				<TD valign=top>
					<input type=text name=question<?=$a->id?> size=60 value="<?=htmlspecialchars($a->question)?>">
				</TD>
			</TR>
			<TR>
				<TD valign=top><b>A: </TD>
				<TD valign=top>
					<textarea name="answer<?=$a->id?>" cols=60 rows=5><?=htmlspecialchars($a->answer)?></textarea>
				</TD>
			</TR>
			</table></td><td class=input><select name="cat<?=$a->id?>">
<?
		// Selection Header
		$qr2 = mysql_query("SELECT * FROM dp_faq_cat_list ORDER BY id");
		while ($n = mysql_fetch_object($qr2)){
			echo "<option value=".$n->id." ".($a->cat == $n->id ? ' selected' : '')."> ". $n->title;
		}
?>
			</select></td><?
			$i++;
		}
?></tr>
<tr><th colspan=4><input type=submit name=change_list value="UPDATE FAQS">
			<input type=submit name=change_list value="DELETE SELECTED" <?=$del_confirm?>></th></tr>
<tr><td class=input colspan=2>&nbsp;</td><td class=input><TABLE cellspacing=0>
			<TR>
				<TD valign=top><b>Q:</TD>
				<TD valign=top>
					<input type=text name=questionnew size=60>
				</TD>
			</TR>
			<TR>
				<TD valign=top><b>A:</TD>
				<TD valign=top>
					<textarea name="answernew" cols=60 rows=5></textarea>
				</TD>
			</TR>
			</TABLE></td><td class=input><select name="catnew">
<?
		// Selection Header
		$qr3 = mysql_query("SELECT * FROM dp_faq_cat_list ORDER BY id");
		while ($a = mysql_fetch_object($qr3)){
			echo "<option value=".$a->id."> ". $a->title;
		}
?>
			</select></td></tr>
<tr><th colspan=4><input type=submit name=change_list value="ADD NEW RECORD"></th></tr>
</table>
</form>
</center>
<?}else{?>SECURITY ALERT: Access Denied<?}?>