/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function () {
    $('#enquiry_now').ajaxForm({
        beforeSubmit: function (formData, jqForm, options) {
            $("div#status").html('');
        },
        success: function (response) {
            var result = $.parseJSON(response);
            $("div#status").html('<div class="alert alert-' + result.status + '" role="alert">' + result.data + '</div>')
            if (result.status === 'success')
            {
                $('#enquiry_now').clearForm();
            }
        }
    });
});