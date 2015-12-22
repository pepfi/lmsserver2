//checkbox 全勾选全不选
$("#all_check").click(function(){
    if(this.checked){
        $("input[name='checkname']").each(function(){this.checked=true;});
    }else{
        $("input[name='checkname']").each(function(){this.checked=false;});
    }
});




//下发命令按钮



$(function(){
	
	var checkAll = $(":checkbox[name=all]");  
	var checkNotAll = $(":checkbox[name=checkname]");   
	var num = checkNotAll.size();					
	
	checkAll.click(function(){
		var flag = $(this).prop("checked");		
		checkNotAll.prop("checked",flag);				
	});
	
	checkNotAll.click(function(){
		var chk = checkNotAll.filter(":checked").size();
		var lalala = $(checkNotAll.filter(":checked")).parent().siblings(".ap_mac").text();		
		checkAll.prop("checked",num==chk);
		$("#apmacContent").text(lalala);
						
	});
	
	
})
//搜索下拉框
$(function(){
	$(".searchSlide").hide();
	$(".select").click(function(){
		$(".searchSlide").slideToggle();
    })
})
</script>


 