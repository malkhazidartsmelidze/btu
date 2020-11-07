function showAdDetails(ad_id){
    var url = `https://iamdataninja.com/admin/reports/ads/details/${ad_id}?`;
    var date_from = $('#date_start').val();
    var date_to = $('#date_end').val();
    var query = {
        date_from: date_from,
        date_to: date_to
    }

    url +=  encodeQueryData(query);
    
    window.open(url, '_blank');
}

function encodeQueryData(data) {
    const ret = [];
    for (let d in data)
      ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));
    return ret.join('&');
 }



function copyToClipboard (str){
    const el = document.createElement('textarea');  // Create a <textarea> element
    el.value = str;                                 // Set its value to the string that you want copied
    el.setAttribute('readonly', '');                // Make it readonly to be tamper-proof
    el.style.position = 'absolute';                 
    el.style.left = '-9999px';                      // Move outside the screen to make it invisible
    document.body.appendChild(el);                  // Append the <textarea> element to the HTML document
    const selected =            
    document.getSelection().rangeCount > 0        // Check if there is any content selected previously
        ? document.getSelection().getRangeAt(0)     // Store selection if found
        : false;                                    // Mark as false to know no selection existed before
    el.select();                                    // Select the <textarea> content
    document.execCommand('copy');                   // Copy - only works as a result of a user action (e.g. click events)
    document.body.removeChild(el);                  // Remove the <textarea> element
    if (selected) {                                 // If a selection existed before copying
        document.getSelection().removeAllRanges();    // Unselect everything on the HTML document
        document.getSelection().addRange(selected);   // Restore the original selection
    }
    toastr.success('Copied ' + str);

};


count_keywords = function(e){
    var tar = $(e);
    var keyword = tar.data('keyw');
    var ad_id = tar.data('ad_id');
    if(keyword){
        var keywords = $('[data-keyw="'+keyword + '"]');
        var ad_ids = '';
        for(var i =0; i<keywords.length; i++) {
            ad_ids += $(keywords[i]).data('ad_id') != ad_id ? $(keywords[i]).data('ad_id') : '';
        }
        
        tar.attr('title', `${keyword} - Matching: ${keywords.length - 1} ${ad_ids ? ', Ads: '+ ad_ids : ''}` )
    }
}


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})