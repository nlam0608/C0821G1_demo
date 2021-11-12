$(document).ready(function () {
    // code JQuery
    /*
    - Cu phap: $(selector).action()
    + $: bat dau voi JQuery
    + selector: dinh danh cho element html
         + id: #nameID -> lay ra duy nhat 1 element
         + class: .className -> lay ra nhieu element vi co chung class
         + tag element: nameTag -> lay ra tat ca cac html cung the

    + action() - hanh dong - phuong thuc - ham
          + tra cuu trong doc JQuery
     */
    let origin = location.origin;

    $('#show-name').click(function () {
        $('.column-name').toggle();
    });

    function hoverUser(color = 'red') {
        $('.user-item').hover(function (){
            $(this).css('background-color', color)
        }, function (){
            $(this).css('background-color', 'white')
        })
    }

    $('#color-name').change(function (){
        // lay ggia  tri tu o input
        let nameColor = $(this).val();
        //hoverUser(nameColor)
        $('body').css('background-color', nameColor).css('color', 'white')
    })

    $('.delete-user-item').click(function (){
        let userID = $(this).attr('data-id');
        // thu hien goi ajax
        $.ajax({
            url: origin + '/admin/users/' + userID + '/delete',
            method: 'GET',
            dataType: 'json',
            success: function (response){
                // xu ly du lieu sau khi goi ajax -> JQuery
                $('#user-item-'+userID).remove();
            },
            error: function (err){

            }
        })
    })

    // delete product
    $('.delete-product').click(function () {
        let inputCheckbox = $('.product-checked');
        let idProductDelete = [];
        for (let i = 0; i < inputCheckbox.length; i++) {
            if (inputCheckbox[i].checked) {
                idProductDelete.push(inputCheckbox[i].value)
            }
        }
        // set csrf vao header cua request

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // goi ajax
        $.ajax({
            url: origin + '/admin/products/delete',
            method: 'POST',
            data: {
                'productId': idProductDelete
            },
            success: function (res) {
                if (res.status === 'success') {
                    for (let i = 0; i < idProductDelete.length; i++) {
                        $('#product-item-' + idProductDelete[i]).remove();
                    }
                }
            },
            error: function (error) {

            }
        })
    })

})
