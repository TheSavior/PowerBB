var ie4 = (document.all) ? 1:0;var gecko=(navigator.userAgent.indexOf('Gecko') > -1) ? 1:0;var op6=(navigator.userAgent.indexOf('Opera/6') > -1) ? 1:0;var op7=(navigator.userAgent.indexOf('Opera/7') > -1) ? 1 : (navigator.userAgent.indexOf('Opera 7') > -1) ? 1:0;var ns4=(navigator.userAgent.indexOf('Mozilla/4.7') > -1) ? 1:0;var sf=(navigator.userAgent.indexOf('Safari') > -1) ? 1:0;if (op7) ie4 = 0;if (sf){ie4 = 0;gecko = 1;}var LinkToField = "";function openspell(){height = 378;width = 551;if (ie4) LinkToField = self.spelling_mod.req_message;if (gecko){LinkToField = parent.document.spelling_mod.req_message;height = height + 6;}if (op6){LinkToField = document.forms[0].req_message;height = height + 10;width = width + 10;}if (op7) LinkToField = document.forms[0].req_message;if (!(op6 || gecko || ie4 || op7)){alert("SpellChecker only supports one of the following browsers:Opera 6+, Netscape 6+, Mozilla 1+, Internet Explorer 4+, Safari");}else{if (LinkToField.value.length == 0) return;directory = "include/js/";k = openspell.arguments.length;if (k == 1) directory = "";win1=window.open(directory+"spell.html","spellcheckwin",'resizable=no,width='+width+',height='+height);if (win1.opener == null) win1.opener = self;}return (false);}function Opera_Get_Link() {return (LinkToField);}