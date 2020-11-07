$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': LA.token,
  },
})

window.selectedcompanies = []

function selectCompany(company_id) {

    if (window.selectedcompanies.indexOf(company_id) == -1) {
        window.selectedcompanies.push(company_id)
    } else {
        window.selectedcompanies.splice(window.selectedcompanies.indexOf(company_id), 1)
    }
}

function deleteSelectedCompanies(event) {

    var checkedArray  = [],
        ad_id         = $(event.target).data("id"),
        parent        = $(event.target).parent().parent().next("div.box-body"),
        checkboxArray = parent.find("input[type=checkbox]");

    checkboxArray.each(function () {

        if ($(this).prop("checked") == true) {
            checkedArray.push($(this).data('company-id'));
        }
    });

    if (checkedArray.length > 0 && confirm("Are You Sure You want To delete Selected " + checkedArray.length + " Companies?'") == true) {

        $.ajax({
            url: '/admin/adtocompany/bulkdelete',
            type: 'POST',
            data: {adtocompanyids : checkedArray, ad_id : ad_id},
            success: function (data) {
                toastr.success('Successfully Deleted')
                setTimeout(function () {
                    document.location.reload()
                }, 1000)
            },
        })
    }

    /*if (selectedcompanies.length > 0 && confirm('Are You Sure You want To delete Selected ' + selectedcompanies.length + ' Companies?')) {
        $.ajax({
            url: '/admin/adtocompany/bulkdelete',
            type: 'POST',
            data: {i: 1, adtocompanyids: selectedcompanies, ad_id: ad_id},
            success: function (data) {
                toastr.success('Successfully Deleted')
                setTimeout(function () {
                    document.location.reload()
                }, 1000)
            },
        })
    }*/
}

function hideButtons() {
  var buttons = $('button[type=submit]')
  // $('.treesavebutton').hide();
  for (var i = 0; i < buttons.length; i++) {
    var button = $(buttons[i])
    button.hide()
  }
}

function updateOrderCompany(e, ordering_id, size, other) {
  var url = '/admin/adcompany/update'
  counter = null

  swal({
    title: 'Change for this company or entire Country?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Country',
    showLoaderOnConfirm: true,
    cancelButtonText: 'This Landing',
  }).then(function(result) {
    var editcountry = false
    if (result.value) {
      editcountry = true
    }
    $.ajax({
      url: url,
      type: 'POST',
      data: {
        ordering_id: ordering_id,
        size: size,
        other: { counter: counter != null, editcountry: editcountry },
      },
      success: function(data) {
        if (data.recache_ids) {
          for (var i = 0, len = data.recache_ids.length; i < len; i++) {
            singleRecacheNew(data.recache_ids[i], i, len)
          }
        }
        $(e)
          .closest('span')
          .children()
          .each(function() {
            $(this).removeClass('checked')
          })
        $(e).toggleClass('checked')
      },
    })
  })
}

function singleRecacheNew(id, i, total) {
  setTimeout(() => {
    $.get('https://iamdataninja.com/admin/tools/recache?ad_id=' + id)
    if (i == total - 1) {
      toastr.success('Everything has been re-cached')
      setTimeout(() => {
        $('#recacheallbutton').html('Refresh Again')
      }, 1500)
    } else {
      $('#recacheallbutton').html('Recached <strong>' + i + '</strong> Ad - ' + (total - i - 1) + ' Remaining')
    }
  }, 50 * i)
}

function globalSave(ad_id) {
  var buttons = $('button[type=submit]')
  href = document.location.href

  for (var i = 0; i < buttons.length; i++) {
    var button = $(buttons[i])
    button.click()
  }

  setTimeout(function() {
    recacheAd(ad_id, function() {
      document.location.href = href
    })
  }, 2000)
}

/*$('#country_id_input').change(function() {
    var country_id = $(this).val()
    $.ajax({
        url: '/admin/api/comp?country_id=' + country_id,
        success: function(data) {
            var companies = data.data

            updateCompanies(companies)
        },
    })
});*/
function changeCountry(event)
{
    var country_id = $(event.target).val()

    $.ajax({
        url: '/admin/api/comp?country_id=' + country_id,
        success: function(data) {
            var companies = data.data

            updateCompanies(companies)
        },
    });
};

function updateCompanies(companies)
{
    var companiestext = '',
        companiesdiv  = $('#companies_input').closest('div');

    $('input[name="companies[]"]').remove()

    for (var i = 0, length = companies.length; i < length; i++) {
        companiestext += '<div class="btn btn-primary company-container position-relative" data-id="' + companies[i].id + '" onclick="selectCompany(event)" style="margin: 0 5px 5px 0">' + companies[i].text + '</div>'
    }

    $(".alert-white").remove();
    companiesdiv.prepend('<div class="alert alert-white" style="padding-left: 0; padding-right: 0;"> ' + companiestext + '</div>');
}

function selectCompany(event)
{
    var company     = $(event.target),
        companyText = company.text(),
        companyID   = company.data("id"),
        value       = $("#companies_input").parent();

    $("input.select2-search__field").attr({style : "width: 0.75em;", placeholder : ""});

    $('.select2-container').find('ul').prepend(`<li class='select2-selection__choice' title="` + companyText + `">
        <span class="select2-selection__choice__remove" role="presentation" onclick="removeCompany(event)">×</span>` + companyText +
    `</li>`);
    $("#companies_input").append("<option value='" + companyID +"'>" + companyText + "</option>");

    $("#companies_input").parent().append(`<input type="hidden" name="companies[]" value="` + companyID + `">`)
}

function removeCompany(event)
{
    $(event.target).parent().remove();
}

function recacheAd(ad_id, callback) {
  $.ajax({
    url: '/admin/tools/recache',
    type: 'GET',
    data: { i: 1, ad_id: ad_id },
    success: function(data) {
      if(!window.hide_notifications) {
        toastr.success('Successfully Cached')
      }
      if (callback) {
        callback(data)
      }
    },
    error: function(e, r, o) {
      toastr.error('Error While Cachinig')
      console.log(e, r, o)
    },
  })
}

function closeZoom() {
  $('body').attr('class', 'skin-blue-light sidebar-mini sidebar-collapse modal-open')
  $('.zoom-container')
    .html('')
    .remove()
}

getFormDataObject = form => {
  var formdata = form.serializeArray()
  var data = {}
  for (var i = 0; i < formdata.length; i++) {
    data[formdata[i].name] = formdata[i].value
  }
  return data
}



// Get ads
function getAds(event)
{
    var id = $(event.target).val();

    if (id) {
        $.ajax({
            url: '/admin/config/get-ads',
            type: 'POST',
            data: {id : id},
            success: function(data) {
                $('.ads-header').html('');
                $('.ads-header').html("<b>Company will be added in <span class='text-primary'>" + data['ads'].length + "</span> advertisements</b>");

                $('.ads').html('');
                for (var i = 0; i < data['ads'].length; i++) {
                    $('.ads').append('<div class="btn btn-primary" style="margin: 5px;">' + data["ads"][i]['name'] + '</div>');
                }

                $('.country_id').val(data['country_id']);
            },
        });
    }
}
