function view(script, width, height){var scr=window.open(script,"wnd","channelmode=no,directories=no,fullscreen=no,width="+width+",height="+height+",location=no,menubar=no,resizable=no,scrollbars=yes,status=no,titlebar=yes,toolbar=0");}function cfmform(){return confirm("Are you sure?");}var marked_row=new Array;function setPointer(theRow,theRowNum,theAction,theDefaultColor,thePointerColor,theMarkColor){var theCells=null;if((thePointerColor==''&&theMarkColor=='')||typeof(theRow.style)=='undefined'){return false;}if(typeof(document.getElementsByTagName)!='undefined'){theCells=theRow.getElementsByTagName('td');}else if(typeof(theRow.cells)!='undefined'){theCells=theRow.cells;}else{return false;}var rowCellsCnt=theCells.length;var domDetect=null;var currentColor=null;var newColor=null;if(typeof(window.opera)=='undefined'&&typeof(theCells[0].getAttribute)!='undefined'){currentColor=theCells[0].getAttribute('bgcolor');domDetect=true;}else{currentColor=theCells[0].style.backgroundColor;domDetect=false;}if(currentColor==''||currentColor.toLowerCase()==theDefaultColor.toLowerCase()){if(theAction=='over'&&thePointerColor!=''){newColor=thePointerColor;}else if(theAction=='click'&&theMarkColor!=''){newColor=theMarkColor;marked_row[theRowNum]=true;}}else if(currentColor.toLowerCase()==thePointerColor.toLowerCase()&&(typeof(marked_row[theRowNum])=='undefined'||!marked_row[theRowNum])){if(theAction=='out'){newColor=theDefaultColor;}else if(theAction=='click'&&theMarkColor!=''){newColor=theMarkColor;marked_row[theRowNum]=true;}}else if(currentColor.toLowerCase()==theMarkColor.toLowerCase()){if(theAction=='click'){newColor=(thePointerColor!='')?thePointerColor:theDefaultColor;marked_row[theRowNum]=(typeof(marked_row[theRowNum])=='undefined'||!marked_row[theRowNum])?true:null;}}if(newColor){var c=null;if(domDetect){for(c=0;c<rowCellsCnt;c++){theCells[c].setAttribute('bgcolor',newColor,0);}}else{for(c=0;c<rowCellsCnt;c++){theCells[c].style.backgroundColor=newColor;}}}return true;}
function change_ln(ln_name){
	SetCookie('ln',ln_name,100);
	window.location.reload()
}


function SetCookie(cookieName,cookieValue,nDays) {
 var today = new Date();
 var expire = new Date();
 if (nDays==null || nDays==0) nDays=1;
 expire.setTime(today.getTime() + 3600000*24*nDays);
 document.cookie = cookieName+"="+escape(cookieValue)
                 + ";expires="+expire.toGMTString();
}

$(document).ready(function(){
   /*  if (window.top!=window.self)  {
        
    } else { 
        window.location.href="https://zoanga.com";
    } */
    $(".tabLink").each(function(){
     $(this).click(function(){
        tabeId = $(this).attr('id');
		//alert(tabeId);
        $(".tabLink").removeClass("activeLink");
        $(this).addClass("activeLink");
        $(".tabcontent").addClass("hide");
        $("#"+tabeId+"-1").removeClass("hide")   
        return false;	  
      });
    });  
    
});
