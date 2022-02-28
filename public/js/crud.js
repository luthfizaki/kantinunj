const baseUrl = 'http://appset_lara8.test';

showProducts();

function table_post_row(res) {
    let htmlView = '';

    if (res.transactions.length <= 0) {
        htmlView += `
            <tr>
                <td colspan="4">No Data.</td>
            </tr>`;
    }

    for (let i = 0; i < res.transactions.length; i++) {
        htmlView += `
            <tr class="align-middle">
             <td>` + (i + 1) + `</td>
             <td class="product-image"> <img src="https://source.unsplash.com/1200x1200?foods" alt=""> </td>
             <td>` + res.transactions[i].product.product_name + `</td>
             <td>` + res.transactions[i].product.price + `</td>
             <td>` + res.transactions[i].amount + `</td>
             <td>` + res.transactions[i].product.price * res.transactions[i].amount + `</td>
              <td>
                <button id="editModal" data-action="" data-id="`+res.transactions[i].id+`" class="btn btn-warning btn-sm" onClick="show( `+res.transactions[i].id+` )">Edit</button>
                <button id="btn-delete" data-id="` + res.transactions[i].id + `" class="btn btn-danger btn-sm" onClick="">Delete</button>
             </td>
            </tr>
                `;
    }

    $('#tbody').html(htmlView);
}

function showProducts() {
    $.ajax({
        type: 'GET',
        dataType: "json",
        url: baseUrl + '/dashboard/product',
        success: function (res) {
            table_post_row(res);
        },
        error: function (error) {
            console.log(error);
        }
    })
}

        // Untuk modal halaman edit show
        function show(id) {
            $.get("" + '/dashboard/product/' + id + '/edit', function(data, status) {
                // $("#exampleModalLabel").html('Edit Product')
                $("#tbody").html(data);
                $("#exampleModal").modal('show');
            });
        }

$('button#openModal').click(function () {
    let url = $(this).data('action');
    $('#exampleModal').modal('show');
    $('#formData').trigger("reset");
    $('#formData').attr('action', url);
})

$('#formData').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        url: $(this).attr('action'),
        beforeSend: function () {
            $('#btn-create').addClass("disabled").html("Processing...").attr('disabled', true);

            $(document).find('span.error-text').text('');
        },

        complete: function () {
            $('btn-create').removeClass("disabled").html("save Change").attr('disabled', false);
        },

        success: function (res) {
            console.log(res);

            if (res.success == true) {
                $('#formData').trigger("reset");
                $('#exampleModal').modal('hide');
                showProducts();
                Swal.fire (
                    'Success!',
                    res.message,
                    'success'
                )
            }
        },

        error(err) {
            $.each(err.responseJSON, function (prefix, val) {
                $('.' + prefix + '_error').text(val[0]);
            })

            console.log(err);
        }
    })
})


// modal
$('body').on('click', '#editModal', function () {
    var id = $(this).data('id');
    var url= baseUrl + `/dashboard/product/${id}/edit`;
    var dataAction = $(this).data('action');
    $('#formData').attr('action', dataAction);
    $.get ("" + '/dashboard/product/' + id + '/edit', function (data) {
        // $('#btn-create').val("edit-user");
        //   $('#exampleModal').modal('show');
        //   $('#id').val(data.id);
        //   $('#amount').val(data.amount);
        //   $('#status').val(data.status);
        alert(data.result.id);
    })

    // $.ajax({
    //     type: 'GET',
    //     url: baseUrl + `/dashboard/product/${id}/edit`,
    //     dataType: "json",
    //     success: function (res) {
    //         $('#name').val(res.transactions.amount);
    //         $('#status').val(res.transactions.status);
    //         $('#exampleModal').modal('show');
    //         console.log(res);
    //     },
    //     error: function (error) {
    //         console.log(error)
    //     }
    // })
});
$('#btn-create').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
          data: $('#formData').serialize(),
          url: "",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#formData').trigger("reset");
              $('#exampleModal').modal('hide');
              table.draw();
              showProducts();
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-create').html('Save Changes');
          }
      });
    });

$(document).on('click', 'button#btn-delete', function (e) {
    e.preventDefault();
    let dataDelete = $(this).data('id');
    // console.log(dataDelete);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this! ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                dataType: 'JSON',
                url: baseUrl + `/dashboard/product/${dataDelete}`,
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    showProducts();
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    })
});
