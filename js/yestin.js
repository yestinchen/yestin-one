/*libraries map etc.*/
function Map() {//初始化map_,给map_对象增加方法，使map_像Map    
     var map_ = new Object();    
     map_.put = function(key, value) {    
         map_[key+'_'] = value;    
     };    
     map_.get = function(key) {    
         return map_[key+'_'];    
     };    
     map_.remove = function(key) {    
         delete map_[key+'_'];    
     };    
     map_.keyset = function() {    
         var ret = "";    
         for(var p in map_) {    
             if(typeof p == 'string' && p.substring(p.length-1) == "_") {    
                 ret += ",";    
                 ret += p.substring(0,p.length-1);    
             }    
         }    
         if(ret == "") {    
             return ret.split(",");    
         } else {    
             return ret.substring(1).split(",");    
         }    
     };    
     return map_;    
}


var Y = {};
Y.conf = {};
/*wigetABackgrounds used to set <a> to different background color*/
Y.conf.wigetABackgrounds = Array("#00a1e0","#00de83","#fc814a","#b44dfc","#de54e0","#4F8ECB","#4DB849","#EC5A4C","#C56C8E");
Y.conf.widgetAColor = "#fff";
Y.conf.widgetADefaultBackground = "#fff";
Y.conf.widgetADefaultColor = "#757575";
/*postListBorderColors used to set post entries border color when mouse hovered*/
Y.conf.postListBorderColors = Array("#00a1e0","#00de83","#fc814a","#b44dfc","#de54e0","#FCD209","#4F8ECB","#4DB849","#EC5A4C","#C56C8E");
Y.conf.postListDefaultBorderColor = "#fff";
/*label colors defined in css
here is max number
start with 0*/
Y.conf.labelColorsLength = 14;
Y.conf.labelColorMap = Map();

function getHashCode(str){
    var hash = 0;
    if (str.length == 0) return hash;
    for (i = 0; i < str.length; i++) {
        char = str.charCodeAt(i);
        hash = ((hash<<5)-hash)+char;
        hash = hash & hash;
    }
    return hash;
}

function randomContent(arr){
    return arr[parseInt(Math.random() * arr.length)];
}

function getRandomedLabelIndex(selector,id){
    var index_ = Y.conf.labelColorMap.get(id);
    if (index_ == undefined){
        index_ = parseInt(Math.random() * Y.conf.labelColorsLength);
        Y.conf.labelColorMap.put(id,index_);
    }
    selector.addClass("tag-gen-"+index_);
    return index_;
}

function setRainbowLabel(labelselector){
    $(labelselector).each(function(){
        getRandomedLabelIndex($(this),getHashCode($(this).html()));
    });
}

function bindRainbowLinkChange(a){
    $(a).bind("mouseenter",function(){
       var display_ = $(this).css("display");
       /*enable this only when display is block.*/
       if(display_ == "block"){
            $(this).css({"color":Y.conf.widgetAColor,
                "background":randomContent(Y.conf.wigetABackgrounds),
                "opacity":"0.5"});
            $(this).animate(
                {"opacity":"1"},
                300);
       }
    });
    $(a).bind("mouseleave",function(){
       var display_ = $(this).css("display");
        if(display_ == "block"){
            $(this).css({"color":Y.conf.widgetADefaultColor,
                "background":Y.conf.widgetADefaultBackground});
       }
    });
}

function bindRainbowLeftBorder(div){
    $(div).bind("mouseenter",function(){
        $(this).css({"border-left-color":randomContent(Y.conf.postListBorderColors)});
    });
    $(div).bind("mouseleave",function(){
        $(this).css({"border-left-color":Y.conf.postListDefaultBorderColor});
    });
}

function setOnTopIfScrolled(id){
    var e_ = $("#"+id);
    //导航距离文档顶部距离 
    var _defautlTop = e_.offset().top - $(document).scrollTop(); 
    //导航距离文档左侧距离 
    var _defautlLeft = e_.offset().left - $(document).scrollLeft(); 
    //导航默认样式记录，还原初始样式时候需要 
    var _position = e_.css('position'); 
    var _top = e_.css('top'); 
    var _left = e_.css('left'); 
    var _zIndex = e_.css('z-index'); 
    var _width = e_.css('width');
    //鼠标滚动事件 
    $(window).scroll(function(){ 
        if($(this).scrollTop() > _defautlTop){
            var ie6 = /msie 6/i.test(navigator.userAgent);
            //IE6不认识position:fixed，单独用position:absolute模拟 
            if(ie6){
                e_.css({'position':'absolute',
                    'top':eval(document.documentElement.scrollTop),
                    'left':_defautlLeft,'z-index':99999});                     
                //防止出现抖动 
                $("html,body").css({'background-image':'url(about:blank)',
                    'background-attachment':'fixed'}); 
            }else{ 
                e_.css({'position':'fixed','top':0+'px',
                    'left':0+'px','z-index':99999}); 
            } 
        }else{ 
            e_.css({'position':_position,'top':_top,
                'left':_left,'z-index':_zIndex}); 
        } 
    });
}

$(document).ready(
    function(){
        setOnTopIfScrolled("menu-top");

        setRainbowLabel(".entry-meta span a");
        bindRainbowLeftBorder($(".post-list-entries"));
        bindRainbowLinkChange($(".widget a"));
        $(".post-list-entries").bind("mouseenter",function(){
             $(this).addClass("post-list-entries-selected");
        });
        $(".post-list-entries").bind("mouseleave",function(){
             $(this).removeClass("post-list-entries-selected");
        });
    }
);
