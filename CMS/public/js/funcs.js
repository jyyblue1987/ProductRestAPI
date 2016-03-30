
var lang = {
                cannot_buy: 'You cannot buy the product with these option variants ',
                no_products_selected: 'No products selected',
                error_no_items_selected: 'No items selected! At least one check box must be selected to perform this action.',
                delete_confirmation: 'Are you sure you want to delete the selected items?',
                text_out_of_stock: 'Out-of-stock',
                items: 'item(s)',
                text_required_group_product: 'Please select a product for the required group [group_name]',
                save: 'Save',
                close: 'Close',
                loading: 'Loading...',
                notice: 'Notice',
                warning: 'Warning',
                error: 'Error',
                text_are_you_sure_to_proceed: 'Are you sure you want to proceed?',
                text_invalid_url: 'You have entered an invalid URL',
                error_validator_email: 'The email address in the <b>[field]<\/b> field is invalid.',
                error_validator_confirm_email: 'The email addresses in the <b>[field]<\/b> field and confirmation fields do not match.',
                error_validator_phone: 'The phone number in the <b>[field]<\/b> field is invalid. The correct format is (555) 555-55-55 or 55 55 555 5555.',
                error_validator_integer: 'The value of the <b>[field]<\/b> field is invalid. It should be integer.',
                error_validator_multiple: 'The <b>[field]<\/b> field does not contain the selected options.',
                error_validator_password: 'The passwords in the <b>[field2]<\/b> and <b>[field1]<\/b> fields do not match.',
                error_validator_required: 'The <b>[field]<\/b> field is required.',
                error_validator_zipcode: 'The ZIP / Postal code in the <b>[field]<\/b> field is incorrect. The correct format is [extra].',
                error_validator_message: 'The value of the <b>[field]<\/b> field is invalid.',
                text_page_loading: 'Loading... Your request is being processed, please wait.',
                error_ajax: 'Oops, something went wrong ([error]). Please try again.',
                text_changes_not_saved: 'Your changes have not been saved.',
                text_data_changed: 'Your changes have not been saved. nPress OK to continue, or Cancel to stay on the current page.',
                file_browser: 'File browser',
                editing_block: 'Editing block',
                editing_grid: 'Editing grid',
                editing_container: 'Editing container',
                adding_grid: 'Adding grid',
                adding_block_to_grid: 'Adding block to grid',
                manage_blocks: 'Manage blocks',
                editing_block: 'Editing block',
                        add_block: 'Add Block'
            }
            
function showHide(div) {
    if (document.getElementById(div).style.display = 'block') {
        document.getElementById(div).style.display = 'none';
    } else {
        document.getElementById(div).style.display = 'block';
    }
}

function requestUrlWithData(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}

function hasClass(element, cls) {
	return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}
function validationFunction(e) {
	var $targ = $(e.target);

	if (!$targ.is("textarea") && !$targ.is(":button,:submit") && !hasClass(e.target, 'nicEdit-main') ) {
		var focusNext = false;
		$(this).find(":input:visible:not([disabled],[readonly]), a").each(function(){
			if (this === e.target) {
				focusNext = true;
			}
			else if (focusNext){
				$(this).focus();
				return false;
			}
		});

		return false;
	}
	return true;
}

