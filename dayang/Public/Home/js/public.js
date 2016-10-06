/**
 * Created by Administrator on 2016/6/15.
 */

 $(function(){
     var h=$(window).height();
     $(".index1 ").height(h);
	 $(".tcbg").height(h);
	 $(".youhuijuan").height(h);
   $(window).resize(function(){
	   var h=$(window).height();
	   $("body").height(h);
	  })
 });
