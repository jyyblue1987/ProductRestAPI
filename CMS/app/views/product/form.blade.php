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
                                            <label for="name" class="cm-required">Name:</label>
                                            <input type="text" id="name" name="name" class="input-text" size="32" maxlength="50" value="{{$product->name}}" />											
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
										
										<input type="hidden" id="video" name="thumbnail" value="{{$thumbnail}}" />	
										
										<div class="form-field" id="div_youtube" >
                                            <label for="youtube_url">Thumbnail:</label>
                                            <input type="text" id="youtube_url" name="youtube_url" class="input-text" size="80" maxlength="200" value="" onkeydown="addVideoItem(event)"/>
                                        </div>
										
										<div class="form-field" id="div_pdf">
                                            <table border="0">
                                                <tr>
                                                    <td width="400px">
                                                        <div id="video_status"></div>
                                                    </td>
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

<script type='text/javascript' src='/js/nicEdit.js'></script>
<script>
	var did = 0;
	function addVideoItem(event){
		if (event.keyCode == 13) { 
			var data = document.getElementById("youtube_url").value;
			var id = "";
			if(data != ""){
				id = 'imageurl_' + did;
				document.getElementById("video_status").innerHTML += "<div id='"+id+"' onclick=deleteVideoItem('"+id+"')>" + data + "</div>";
				document.getElementById("youtube_url").value = "";				
				did = did + 1;		

				var total = "";
				var i= 0;
				for(i = 0; i < did; i++){
					id = 'imageurl_' + i;
					var content = document.getElementById(id).innerHTML;
					if( i == 0 )
						total += content;
					else
						total += "|" + content;					
				}			
				$("#video").val(total);				
			}
		}
	}	
	
	function deleteVideoItem(id){
		if(confirm("Do you want to remove this video?")){
			var total = "";
			var i= 0;
			var newid = 0;
			var html = "";
			for(i = 0; i < did; i++){
				if( ('imageurl_' + i) == id )
					continue;
				
				var oldimgid = 'imageurl_' + i;
				var content = document.getElementById(oldimgid).innerHTML;
				var newimgid = 'imageurl_' + newid;
				html += "<div id='"+newimgid+"' onclick=deleteVideoItem('"+newimgid+"')>" + content + "</div>";				
				if( newid == 0 )
					total += content;
				else
					total += "|" + content;
				newid++;
			}
			did = newid;
			document.getElementById("video_status").innerHTML = html;					
			$("#video").val(total);
		}
	}
	
	loadThumbnails("{{$thumbnail}}");
	function loadThumbnails(thumbnail)
	{
		var img_array = thumbnail.split("|");
		var html = "";
		for (var i = 0; i < img_array.length; i++)
		{
			var imgid = 'imageurl_' + i;
			html += "<div id='"+imgid+"' onclick=deleteVideoItem('"+imgid+"')>" + img_array[i] + "</div>";							
		}
		did = img_array.length;
		document.getElementById("video_status").innerHTML = html;					
	}
	
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
