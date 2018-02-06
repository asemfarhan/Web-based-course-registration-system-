function confirm_del(cUrl)
{
    if (window.confirm(class_confirm_delete)) window.location = cUrl;
}
function confirm_action(cUrl,text)
{
    if (window.confirm(text)) window.location = cUrl;
}
function validate_date(cDate) // check date in dd.mm.yyyy
{
    reDate = /(\d+)\.(\d+)\.(\d+)/;
    if (cDate.search(reDate) != -1)
    {
        aDate = cDate.match(reDate);
        if (aDate.length > 3)
        {
            aDate[2] = Number(aDate[2])-1;
            if (aDate[3] < 70) aDate[3] = Number(aDate[3])+2000;
            dDate = new Date(aDate[3], aDate[2], aDate[1]);
            return (dDate.getDate() == aDate[1] && dDate.getMonth() == aDate[2] && dDate.getYear() == aDate[3]);
        }
    }
    return false;
}
function validate_notempty(cValue)
{
	if (cValue == '') return false;
var result = cValue.match(/^\s*$/g);
	if (result && result[0] != '') return false; //Mozilla fix
	return true;
//    return !cValue.match(/^\s*$/g);
}
function fail(cText)
{
    alert(cText);
    return false;
}

function validate_email(cValue){
    return cValue.match(/^[a-zA-Z]+([a-zA-Z0-9.\-_])*@([a-zA-Z0-9]+[.\-])+[a-zA-Z]+$/);
}

function validate_form(form, count){
  for(i=1;i<=count;i++){
    eval("a=form.edit"+i);
    if(a.checked) return true;
  }
  return fail(class_no_rows_to_edit);
}

function invert_selection(form, count){
  for(i=1;i<=count;i++){
    eval("a=form.edit"+i);
    a.checked = (a.checked+1)%2;
  }
  return false;
}

function wo(url,n,p){
    window.open(url,n,p);
}

function setCookie(name, value, expires, path, domain, secure)
{
    var curCookie = name + '=' + escape(value) +
        ((expires) ? '; expires=' + expires : '') +
        ((path) ? '; path=' + path : '') +
        ((domain) ? '; domain=' + domain : '') +
        ((secure) ? '; secure' : '');
    document.cookie = curCookie;
}
function getCookie(name)
{
    var prefix = name + '=';
    var cookieStartIndex = document.cookie.indexOf(prefix);
    if (cookieStartIndex == -1)
        return null;
    var cookieEndIndex = document.cookie.indexOf(';', cookieStartIndex + prefix.length);
    if (cookieEndIndex == -1)
        cookieEndIndex = document.cookie.length;
    return unescape(document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex));
}
function deleteCookie(name, path, domain)
{
    if (getCookie(name)) {
        document.cookie = name + '=' + 
        ((path) ? '; path=' + path : '') +
        ((domain) ? '; domain=' + domain : '') +
        '; expires=Thu, 01-Jan-1970 00:00:00 GMT';
    }
}

//switch visibility of id-th page content
function switch_div(id){
  eval("obj = document.all.page_div"+id+";"); //div of page
  eval("img_obj = document.all.page_img"+id+";"); //picture

  if(obj.style.display){
    obj.style.display='';
    img_obj.src = 'img/minus.gif';
  }else{
    obj.style.display='none';
    img_obj.src = 'img/plus.gif';
  }
}

//switch visibility of id-th page content
function switch_path_div(id, path){
  eval("var obj = document.all.page_div"+id+";"); //div of page
  eval("var img_obj = document.all.page_img"+id+";"); //picture

  if(obj.style.display){
    obj.style.display='';
    img_obj.src = path+'minus.gif';
  }else{
    obj.style.display='none';
    img_obj.src = path+'plus.gif';
  }
}

//для вывода иерархии страниц
var what;
var where;

var im_plus = new Image();
	im_plus.src = 'img/plus.gif';
var im_minus = new Image();
	im_minus.src = 'img/minus.gif';
//для вывода иерархии страниц

//переключение видимости/невидимости div'а
function switch_div_obj(obj, img_obj){
  if(obj.style.display){
    obj.style.display='';
    img_obj.src = 'img/minus.gif';
  }else{
    obj.style.display='none';
    img_obj.src = 'img/plus.gif';
  }
}

//switch visibility of div element
function switch_only_div(obj){

  if(obj.style.display){
    obj.style.display='';
  }else{
    obj.style.display='none';
  }
}

function CreateLayer(text, id, t, l){
	if(document.layers){
		var str="<LAYER ID=menu" + id + " TOP=" + t + " LEFT=" + l + " onmouseover=\"occupied_menu[" + id + "]=1;\" onmouseout=\"Turn('" + id + "',0);occupied_menu[" + id + "]=0;\" VISIBILITY=HIDE>" + text + "</LAYER>";
		document.write(str);
	}else if(document.all){
		var strng="<div id=menu" + id + " style=\"position:absolute;top:" + t + ";left:" + l + ";visibility:hidden;width:100;\" onmouseover=\"occupied_menu[" + id + "]=1;\" onmouseout=\"Turn('" + id + "',0);occupied_menu[" + id + "]=0;\">" + text + "</div>";
		document.write(strng);
	}
 }

function Turn(id, mode){
  if(mode)
   eval("setTimeout(\"On(" + id + ", " + mode + ");\",100)");
  else
   eval("setTimeout(\"Off(" + id + ", " + mode + ");\",100)");
}

function On(id, mode){
  if(occupied_header[id]){
   if(document.all){
    eval("menu" + id).style.visibility = 'visible';
   }
   else if(document.layers){
    eval("document.layers['menu" + id + "']").visibility = "show";
   }
  }
}
 
function Off(id, mode){
  if(!occupied_menu[id] && !occupied_header[id]){
   if(document.all)
    eval("menu" + id).style.visibility = 'hidden';
   else if(document.layers)
    eval("document.layers['menu" + id + "']").visibility = "hide";
  }
}

function setCookie(name, value, expires, path, domain, secure)
{
    var curCookie = name + '=' + escape(value) +
        ((expires) ? '; expires=' + expires : '') +
        ((path) ? '; path=' + path : '') +
        ((domain) ? '; domain=' + domain : '') +
        ((secure) ? '; secure' : '');
    document.cookie = curCookie;
}
function getCookie(name)
{
    var prefix = name + '=';
    var cookieStartIndex = document.cookie.indexOf(prefix);
    if (cookieStartIndex == -1)
        return null;
    var cookieEndIndex = document.cookie.indexOf(';', cookieStartIndex + prefix.length);
    if (cookieEndIndex == -1)
        cookieEndIndex = document.cookie.length;
    return unescape(document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex));
}
function deleteCookie(name, path, domain)
{
    if (getCookie(name)) {
        document.cookie = name + '=' + 
        ((path) ? '; path=' + path : '') +
        ((domain) ? '; domain=' + domain : '') +
        '; expires=Thu, 01-Jan-1970 00:00:00 GMT';
    }
}
