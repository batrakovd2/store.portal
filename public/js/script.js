$(document).ready(function () {

    const PORTAL = 'https://portal.loc/';

    /* Common functions */
    function axiosPostRequest(api, params, responseFunc) {
        axios.post(api, params).then((response) => {
            responseFunc(response);
        });
    }

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    $(function () {
        $('#summernote').summernote()
    })

    function modalSweetAlert(response) {
        if (response.data['status'] == 'success') {
            Toast.fire({
                icon: 'success',
                title: response.data['desc']
            });
        }
        if (response.data['status'] == 'error') {
            if (Array.isArray(response.data['desc'])) {
                response.data['desc'].forEach(function (item) {
                    toastr.error(item)
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: response.data['desc']
                });
            }
        }
    }

    function parentChecker(list, chips, fieldId, api) {
        $(list).change(function () {
            const self = $(this);
            id = $(this).val();
            title = $(this).find(`[value=${id}]`).text();
            url = api;
            params = {id: id};

            function changeListResponse(response) {
                $(chips).append('<div class="btn btn-info btn-sm mr-2 chips-btn" data-id="' + $(list + ' option:selected').val() + '">' + $(list + ' option:selected').text() + '</div>');
                $(fieldId).val(id);
                if (response.data && response.data.length > 0) {
                    $(list).children().remove();
                    optionStr = '<option value="0">Нет</option>';
                    response.data.forEach(function (item) {
                        optionStr = optionStr + '<option value="' + item.id + '">' + item.title + '</option>';
                    });
                    $(list).html(optionStr);
                } else {
                    $(list).children().remove();
                    $(list).html('<option value="0">Нет</option>');
                    self.attr('disabled', true);
                }
            }

            axiosPostRequest(url, params, changeListResponse);

        });

        $('body').on('click', chips + ' .chips-btn', function () {
            let block = $(this), count = 1;
            $(list).attr('disabled', false);
            $(chips + ' .chips-btn').each(function (i, f) {

                if ($(f).data('id') == block.data('id')) {
                    count = i;
                }
            });
            let id = 0;
            if ($(chips + ' .chips-btn:nth-child(' + (count) + ')').length) {
                id = $(chips + ' .chips-btn:nth-child(' + (count) + ')').data('id');
            }
            url = api;
            params = {id: id};

            function clickChipsResponse(response) {
                $(fieldId).val(id);
                if (response.data && response.data.length > 0) {
                    $(list).children().remove();
                    optionStr = '<option value="0">Нет</option>';
                    response.data.forEach(function (item) {
                        optionStr = optionStr + '<option value="' + item.id + '">' + item.title + '</option>';
                    });
                    $(list).html(optionStr);
                    $(chips + ' .chips-btn').each(function (i, f) {
                        if (i >= count) {
                            $(f).remove();
                        }
                    })
                }
            }

            axiosPostRequest(url, params, clickChipsResponse);

        });
    }

    function deleteItemFromList(removeClass, api) {
        $('body').on('click', removeClass, function () {
            const id = $(this).data('id');
            url = api;
            const self = $(this);
            params = {id: id};

            function removeResponseFunc(responce) {
                if (responce.data['status'] == 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: responce.data['desc']
                    });
                    self.closest('tr').remove();
                }
                if (responce.data['status'] == 'error') {
                    Toast.fire({
                        icon: 'error',
                        title: responce.data['desc']
                    });
                }
            }

            axiosPostRequest(url, params, removeResponseFunc);
        });

    }

    function getAnyPageParameters(formselector) {
        const form = document.querySelector(formselector);
        const formdata = new FormData(form);
        return formdata;
    }

    function addAdminItemList(response) {
        modalSweetAlert(response);
        if (response.data['status'] == 'success' && response.data["item"]) {
            renderAdminItemList(response.data["item"])
        }
    }

    function renderAdminItemList(item) {
        const itemList = $('.card-item-list').find('td');
        const str = itemList.text();
        const oldTitle = $('input[name="title"]').data('title');
        if(str.includes(oldTitle)){
            itemList.each(function (el) {
                const strEl = $(this).text();
                if(oldTitle && strEl.includes(oldTitle)){
                    $(this).text(item.title);
                }
            })
        } else {
            let element =  '<tr><td>' + item.title +'</td> <td><a href="#" data-id="' + item.id +'" title="Edit" class="btn btn-secondary btn-sm edit float-right ml-2 remove-product-btn"><i class="fas fa-trash"></i></a> <a href="/admin/product/' + item.id +'/edit" title="Edit" class="btn btn-secondary btn-sm edit float-right ml-2"><i class="fas fa-pencil-alt"></i></a></td></tr>';
            $('.card-item-list').find('tbody').prepend(element);
        }

    }

    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    /* User page events */

    $('.createUser').click(function () {
        username = $('#inputName').val();
        lastname = $('#inputLastName').val();
        patronymic = $('#inputPatronymic').val();
        email = $('#inputEmail').val();
        password = $('#inputPassword').val();
        address = $('#inputAdress').val();
        phone = $('#inputPhone').val();
        isadmin = $('#inputIsAdmin').val();
        url = '/api/user/add';
        params = {
            name: username,
            lastname: lastname,
            patronymic: patronymic,
            email: email,
            address: address,
            password: password,
            phone: phone,
            is_admin: isadmin
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('.editUser').click(function () {
        id = $('#userid').val();
        username = $('#inputName').val();
        lastname = $('#inputLastName').val();
        patronymic = $('#inputPatronymic').val();
        email = $('#inputEmail').val();
        password = $('#inputPassword').val();
        address = $('#inputAdress').val();
        phone = $('#inputPhone').val();
        isadmin = $('#inputIsAdmin').val();
        url = '/api/user/edit/' + id;
        params = {
            name: username,
            lastname: lastname,
            patronymic: patronymic,
            email: email,
            address: address,
            password: password,
            phone: phone,
            is_admin: isadmin
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('body').on('click', '.remove-user-btn', function () {
        const id = $(this).data('id');
        url = '/api/user/remove';
        params = {id: id};
        $(this).closest('tr').remove();
        axiosPostRequest(url, params, modalSweetAlert);
    });

    /* Company page events */

    $('.editCompany').click(function () {
        const params = getAnyPageParameters('#companyForm');
        url = '/api/company/edit/' + params.get('companyid');
        axiosPostRequest(url, params, modalSweetAlert);
    });

    parentChecker("#city-list", "#city_array", "#city-id", "/api/city/getChild");

    /* Page events */

    $('.editPage').click(function () {
        const params = getAnyPageParameters('#pageForm');
        const url = '/api/page/edit/' + params.get('pageid');
        axiosPostRequest(url, params, modalSweetAlert);
    });

    /* Category page events */

    $('.createCategory').click(function () {
        const url = '/api/category/add';
        const params = getAnyPageParameters('#categoryForm');
        axiosPostRequest(url, params, addAdminItemList)
    });

    $('.editCategory').click(function () {
        const params = getAnyPageParameters('#categoryForm');
        const url = '/api/category/edit/' + params.get('categoryid');
        axiosPostRequest(url, params, addAdminItemList);
    });

    deleteItemFromList('.remove-category-btn', '/api/category/remove');

    parentChecker("#category-list", "#category_array", "#category-id", "/api/category/getChild");

    /* Product page events */

    $('.createProduct').click(function () {
        const params = getAnyPageParameters('#productForm');
        const url = '/api/product/add';
        axiosPostRequest(url, params, addAdminItemList);
    });

    $('.editProduct').click(function () {
        const params = getAnyPageParameters('#productForm');
        const url = '/api/product/edit/' + params.get('productid');
        axiosPostRequest(url, params, addAdminItemList);
    });

    deleteItemFromList('.remove-product-btn', '/api/product/remove');

    parentChecker("#rubric-list", "#rubric_array", "#rubric-id", "/api/rubric/getChild");

    /* bind user page */
    $('.bindUser').click(function (e) {
        const params = getAnyPageParameters('#userSearcher');
        const url = '/api/user/bind';
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('.detachUser').click(function () {
        const dataid = $(this).data('id');
        const params = {id: dataid};
        const url = '/api/user/detach';
        axiosPostRequest(url, params, modalSweetAlert);
    });

    /* bind news page */
    $('.createNews').click(function () {
        const params = getAnyPageParameters('#newsForm');
        const url = '/api/news/add';
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('.editNews').click(function () {
        const params = getAnyPageParameters('#newsForm');
        const url = '/api/news/edit/' + params.get('newsid');
        axiosPostRequest(url, params, modalSweetAlert);
    });

    deleteItemFromList('.remove-news-btn', '/api/news/remove');

    /* bind review page */

    $('.editReview').click(function () {
        const params = getAnyPageParameters('#reviewForm');
        const url = '/api/review/edit/' + params.get('reviewid');
        axiosPostRequest(url, params, modalSweetAlert);
    });

    deleteItemFromList('.remove-review-btn', '/api/review/remove');





});
