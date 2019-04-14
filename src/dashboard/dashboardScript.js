$(window).on( "load", function(){
	$("#username").load( "../../../src/dashboard/userInfo.php");
	homepageLoad()
});

function homepageLoad() {
	$.ajax({
            type:'GET',
            url:'../../../src/dashboard/subpages/welcomePage.php',
            success:function(data){
                $('#content').html(data);
                $('#content').show();
            }
    });
}

function apiListCreate() {
	$.ajax({
            type:'GET',
            url:'../../../src/dashboard/subpages/apiList.php',
            success:function(data){
                $('#content').html(data);
                $('#prepare_list').DataTable({
                    columnDefs: [
                    {
                        targets: [0,3,4],
                        className: 'alignCenter'

                    }
                    ]
                });
            }
    });
}

$(document).ready(function(){
	$("#apiList").click(function(){
		 apiListCreate();
  	});

  	$("#apiCreator").click(function(){
		$.ajax({
                type:'GET',
                url:'../../../src/dashboard/subpages/apiCreator.php',
                success:function(data){
                    $('#content').html(data);
                    inPreparationListCreate();
                    $('#exchange').load('../../../src/api/apiCreator/exchangesList.php');
                    autocompleteChoiceList();
                }
            }); 
  	});
});

/*
Api creator functionality
 */

function autocompleteChoiceList() {
	$('#exchange').on('change',function(){
    	var exchangeName = $(this).val();
        if(exchangeName){
        	$.ajax({
            	type:'POST',
            	url:'../../../src/api/apiCreator/fromCurrencyList.php',
            	data:'exchangeName='+exchangeName,
            	success:function(data){
            		$('#from_currency').html(data);
            		$('#to_currency').html('<option value="">Select from currency first</option>');
        		}
        	}); 
        }
        else{
            $('#from_currency').html('<option value="">Select exchange first</option>');
            $('#to_currency').html('<option value="">Select exchange first</option>');
        }
    });
	$('#from_currency').on('change',function(){
        var fromCurrencyName = $(this).val();
        var exchangeName = $('#exchange').val();
        if(fromCurrencyName){
            $.ajax({
                type:'POST',
                url:'../../../src/api/apiCreator/toCurrencyList.php',
                data:{fromCurrencyName,exchangeName},
                success:function(data){
                    $('#to_currency').html(data); 
                }
            }); 
        }else{
            $('#to_currency').html('<option value="">Select from currency first</option>'); 
        }
    });
}

function sendSingleRow() {
  	var exchange = $('#exchange').val();
	var fromCurrency = $('#from_currency').val();
	var toCurrency = $('#to_currency').val();
	if(toCurrency && (exchange!="Select exchange")){
		$.ajax({
			type:'POST',
			url:'../../../src/api/apiCreator/sendRow.php',
			data:{exchange,fromCurrency,toCurrency},
			success:function(data){
                    if(data != ""){
                        alert(data);
                    }
                    inPreparationListCreate(); 
                }
			}
		);
	}
    else{
        alert("Element is not complete!");
    }
	
}

function inPreparationListCreate(){
	var urlIn = '../../../src/api/apiCreator/inPreparationList.php';
	$.get(urlIn, function(data){
		$('#in_preeparation_list').html(data);
		$('#list_in_preparation').DataTable({
                    columnDefs: [
                    {
                        targets: 3,
                        className: 'alignCenter'
                    }
                    ]
                });
	});
}

$(document).on('click','.removeInPreparationRow',function(){
	var urlIn = '../../../src/api/apiCreator/removeInPreparationRow.php';
	var idToRemove = $(this).attr("id");
	$.ajax({
		type:'POST',
		url:urlIn,
		data:{idToRemove},
		success:function(data){
        	inPreparationListCreate();
        }
	});
})

function createApi(){
	var urlIn = '../../../src/api/apiCreator/apiCreate.php';
    var apiName = $("#inApiName").val();
	$.ajax({
		type:'POST',
		url:urlIn,
        data:{apiName},
		success:function(data){
			inPreparationListCreate();
            $("#inApiName").val("");
            if(data != ""){
                alert(data);
            }
        }
	});
}

$(document).on('click','.removeCreatedApi',function(){
    if (confirm('Are you sure you want to delete this API?')) {
        var urlIn = '../../../src/api/apiListCreator/createdApiRemove.php';
        var idToRemove = $(this).attr("id");
    	$.ajax({
    		type:'POST',
    		url:urlIn,
    		data:{idToRemove},
    		success:function(){
            	apiListCreate();
            }
    	});
    }
})

function removeAllInPreparation(){
	$.ajax({
        	type:'GET',
        	url:'../../../src/api/apiCreator/removeAll.php',
        	success:function(){
        		inPreparationListCreate();
        	}
    }); 
};

$(document).on('click','.viewInformation',function(){
    var urlIn = '../../../src/api/apiListCreator/infoViewer.php';
    var apiId = $(this).attr("id");
    $.ajax({
        type:'POST',
        url:urlIn,
        data:{apiId},
        success:function(data){
            alert("Information about API: " + data);
        }
    });
})