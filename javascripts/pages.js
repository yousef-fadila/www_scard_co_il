function getMapField(e){
    if($('#location').length === 0){
        $(e).next().html('<p>הכנס כתובת</p><input id="location" type="text" name="location">');
    }else{
        $(e).next().html('כבר בחרת בדף מפה');
        $(e).value = "";
    }
}
    
function getCustomFields(e){
    $(e).next().html(
        '<div class="custome">' +
        '<p>נא להכניס כתורת ותוכן</p>' +
        '<input type="text" name="c-title[]" value="title" ><br>' +
        '<textarea name="c-content[]">connect</textarea>' +    
        '</div>'
    );
}
    
function getUpdateFeed(e){
    if($('#updates').length === 0){
        $(e).next().html('<p>נא להכניס את ה הטוויטר</p><input id="twitter" type="text" name="twitter">');
    }else{
        $(e).next().html('כבר בחרת בדף עדכונים');
        $(e).value = "";
    }
}
    
function getFacebook(e){
    if($('#facebook').length === 0){
        $(e).next().html('<p>enter Facebook</p><input id="facebook" type="text" name="facebook">');
    }else{
        $(e).next().html('כבר בחרת בדף facebook');
        $(e).value = "";
    }
}
    
function getShare(e){
    if($('#share').length === 0){
        $(e).next().html('<p id="share">דף שיתוף יתווסף לאפליקציה</p>');
    }else{
        $(e).next().html('כבר בחרת בדף שיתוף');
        $(e).value = "";
    }
}
    
function getAbout(e){
    if($('#about').length === 0){
        $(e).next().html('<p>נא לכתוב תוכן דף האודות</p><textarea name="about" id="about"></textarea>');
    }else{
        $(e).next.html('כבר בחרת בדף אודות');
        $(e).value = "";
    }
}
    
$(document).ready(function() {
    $('select').change(function() {
        $(this).next().empty();
        $(this).next().hide();
            
        switch(this.value){
            case ('map'):
                getMapField(this);
                break;
            case ('custome'):
                getCustomFields(this);
                break;
            case ('updates'):
                getUpdateFeed(this);
                break;
            case ('facebook'):
                getFacebook(this);
                break;
            case ('share'):
                getShare(this);
                break;
            case ('about'):
                getAbout(this);
                break;
            default:
                $(this).next().html('');
        } 
            
        $(this).next().show(1000);//TODO move this to the switch
    });
});
