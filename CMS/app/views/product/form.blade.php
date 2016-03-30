@extends('layout')
@section('content')

<?php
	
	$method = "post";								
	$create = 'Create';
	$title = "Add Product";
	if( !empty($product->id) )
	{
		$method = "put";								
		$create = "Save";								
		$title = "Update Product";
	}

?>
	
<table cellpadding="0" cellspacing="0" border="0" class="content-table">
    <tr valign="top">
        <td width="1px" class="side-menu">
            <div id="right_column">

            </div>
        </td>
        <td class="content">
			<div class="mainbox-breadcrumbs">
                &nbsp;
            </div>

            <div id="main_column" class="clear">
                <?php
					if( $errors->any() )
					{
						$message = $errors->first();
						if( $message === 'SUCCESS' )
							Functions::alertSuccessMessage('');
						else if( $message !== '' )
							Functions::alertErrorMessage ($message);	
					}		
				?>
                <script type="text/javascript" src="/js/profiles_scripts.js"></script>

                <div>
                    <h1 class="mainbox-title">
					{{$title}}
                    </h1>
                    <div class="mainbox-body" >

                        <script type="text/javascript" src="/js/tabs.js"></script>

                        <!--                        <div class="tabs cm-j-tabs cm-track">
                                                    <ul>
                                                        <li id="general" class="cm-js"><a >General</a></li>
                                                    </ul>
                                                </div>-->
                        <div class="cm-tabs-content">							
							{{ Form::open(array('url' => 'product/'. $product->id, 'method' => $method )) }}
                                <div id="content_general">
                                    <fieldset>
                                        <h2 class="subheader">
                                            Product information
                                        </h2>
											
										
										<div class="form-field">
                                            <label for="title" class="cm-required">Name:</label>
                                            <input type="text" id="title" name="title" class="input-text" size="32" maxlength="50" value="{{$product->name}}" />											
                                        </div>
										
										<div class="form-field">
                                            <label for="category" class="cm-required">Category:</label>
                                            <input type="text" id="category" name="category" class="input-text" size="32" maxlength="50" value="{{$product->category}}" />											
                                        </div>
										
										<div class="form-field">
                                            <label for="desc" class="cm-required">Description:</label>
                                            <textarea name="desc" id="desc" cols="55" rows="4" class="input-textarea-long">{{$product->desc}}</textarea>
                                            &nbsp;<div><font color="blue">( Best max: 500 characters )</font></div>
                                        </div>
										
										<input type="hidden" id="thumbnail" name="thumbnail" value="{{$product->thumbnail}}" />										
										<div class="form-field" id="thumbnail">
                                            <label>Thumbnail:</label>
                                            <table border="0">
                                                <tr>
                                                    <td width="400px">
                                                        <div id="thumbnail_upload">Upload</div>
                                                    </td>
                                                    <td valign="middle">
                                                        <div><font color="blue">Max size: 10MB (900 * 400 pixels) , *.jpg, *.png</font></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="400px">
                                                        <div id="thumbnail_status"><img src="{{"/uploads/file/".$product->thumbnail}}" width="100px" height=100px></div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>		
			
                                    </fieldset>

                                </div>

<!--                                <p class="select-field notify-customer cm-toggle-button">
    <input type="checkbox" name="notify_customer" value="Y" checked="checked" class="checkbox" id="notify_customer" />
    <label for="notify_customer">Notify user</label>
</p>-->
							
                                <div class="buttons-container buttons-bg cm-toggle-button">
                                    <span  class="submit-button cm-button-main ">
                                        <input type="submit" name="dispatch[profiles.update]" value="{{$create}}" onclick="onSubmit()" />
                                    </span>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="cm-button-main cm-process-items">
                                        <input type="button" onclick="location.href = '/product';"  value="Cancel" />
                                    </span>
                                </div>

                            </Form>
                        </div>
                    </div>
                </div>
                <!--main_column-->
            </div>
        </td>
    </tr>
</table>

<script type="text/javascript">
	var thumbnail = {
        url: "/upload",
        dragDrop: false,
        fileName: "myfile",
        multiple: false,
        showCancel: false,
        showAbort: false,
        showDone: false,
        showDelete: false,
        showError: true,
        showStatusAfterSuccess: false,
        showStatusAfterError: false,
        showFileCounter: false,
        allowedTypes: "jpg,png",
        maxFileSize: 5120000,
        returnType: "text",
        onSuccess: function(files, data, xhr)
        {
            $("#thumbnail").val(data);
 //           $("#status").html("<div>" + data + "</div>");
            $("#thumbnail_status").html("<img width=100px height=100px src=\"/uploads/file/" + data + "\">");			
        },
        deleteCallback: function(data, pd)
        {
            for (var i = 0; i < data.length; i++)
            {
                $.post("file_delete.php", {op: "delete", name: data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message
                    $("#thumbnail_status").html("<div>File Deleted</div>");
                });
            }
            pd.statusbar.hide(); //You choice to hide/not.

        }
    }
	
	$("#thumbnail_upload").uploadFile(thumbnail);
	
	
</script>

<link rel='stylesheet' href='/css/jquery.datetimepicker.css'/>
<script src='/js/jquery.datetimepicker.full.js'></script>
<script>
	$('#startdate').datetimepicker({
		lang:'ch',
		timepicker:false,
		format:'Y-m-d',
		formatDate:'Y/m/d'
	});
	$('#enddate').datetimepicker({
		lang:'ch',
		timepicker:false,
		format:'Y-m-d',
		formatDate:'Y/m/d'
	});

</script>

<script type='text/javascript' src='/js/nicEdit.js'></script>
<script>
	
	bkLib.onDomLoaded(function() {
		new nicEditor({fullPanel : true}).panelInstance('desc');
	});
	
	function onSubmit(){
		var nicE = new nicEditors.findEditor('desc');
		var question = nicE.getContent();
		$("#desc").val(question );
		//alert(question );
		document.forms[''].submit();
	}
</script>

@stop
