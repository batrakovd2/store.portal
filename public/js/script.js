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
            if (response.data['desc'].length > 1) {
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
            $('.chips-btn').each(function (i, f) {

                if ($(f).data('id') == block.data('id')) {
                    count = i;
                }
            });
            let id = 0;
            if ($('.chips-btn:nth-child(' + (count) + ')').length) {
                id = $('.chips-btn:nth-child(' + (count) + ')').data('id');
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
                    $('.chips-btn').each(function (i, f) {
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
        str = $('.card-item-list').find('td').text()

        let element =  '<tr><td>' + item.title +'</td> <td><a href="#" data-id="' + item.id +'" title="Edit" class="btn btn-secondary btn-sm edit float-right ml-2 remove-product-btn"><i class="fas fa-trash"></i></a> <a href="/admin/product/' + item.id +'/edit" title="Edit" class="btn btn-secondary btn-sm edit float-right ml-2"><i class="fas fa-pencil-alt"></i></a></td></tr>';
        $('.card-item-list').find('tbody').prepend(element);
    }


    /* Rubric page events */

    /* Field page events */

    $('.createField').click(function () {
        title = $('#inputName').val();
        url = '/api/field/add';
        params = {
            title: title
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('.editField').click(function () {
        id = $('#fieldid').val();
        title = $('#inputName').val();
        url = '/api/field/edit/' + id;
        params = {
            title: title
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('body').on('click', '.remove-field-btn', function () {
        const id = $(this).data('id');
        url = '/api/field/remove';
        params = {id: id};
        $(this).closest('tr').remove();
        axiosPostRequest(url, params, modalSweetAlert);
    });

    /* Unit page events */

    $('.createUnit').click(function () {
        title = $('#inputName').val();
        meta = $('#inputMeta').val();
        parentId = $('#parent-unit').val();
        url = '/api/unit/add';
        params = {
            title: title,
            meta: meta,
            parent_id: parentId
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('.editUnit').click(function () {
        id = $('#fieldid').val();
        title = $('#inputName').val();
        url = '/api/unit/edit/' + id;
        params = {
            title: title
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('body').on('click', '.remove-unit-btn', function () {
        const id = $(this).data('id');
        url = '/api/unit/remove';
        params = {id: id};
        $(this).closest('tr').remove();
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $("#unit-list").change(function () {
        id = $(this).val();
        title = $(this).find(`[value=${id}]`).text();
        url = '/api/unit/getChild';
        params = {id: id};

        function changeListResponse(response) {
            $('#unit_array').append('<button class="btn btn-info btn-sm mr-2 chips-btn" data-id="' + $('#unit-list option:selected').val() + '">' + $('#unit-list option:selected').text() + '</button>');
            $('#parent-unit').val(id);
            if (response.data && response.data.length > 0) {
                $('#unit-list').children().remove();
                optionStr = '<option value="0">Нет</option>';
                response.data.forEach(function (item) {
                    optionStr = optionStr + '<option value="' + item.id + '">' + item.title + '</option>';
                });
                $('#unit-list').html(optionStr);
            } else {
                $('#unit-list').children().remove();
                $('#unit-list').html('<option value="0">Нет</option>');
                $(this).attr('disabled', true);
            }
        }

        axiosPostRequest(url, params, changeListResponse);

    });

    $('body').on('click', '#unit_array .chips-btn', function () {
        let block = $(this), count = 0;
        $('#unit-list').attr('disabled', false);
        $('#unit_array .chips-btn').each(function (i, f) {
            if ($(f).data('id') == block.data('id')) {
                count = i;
            }
        });
        let id = 0;
        if ($('#unit_array .chips-btn:nth-child(' + (count) + ')').length) {
            id = $('#unit_array .chips-btn:nth-child(' + (count) + ')').data('id');
        }
        url = '/api/unit/getChild';
        params = {id: id};

        function clickChipsResponse(response) {
            $('#unit-list').val(id);
            if (response.data && response.data.length > 0) {
                $('#unit-list').children().remove();
                optionStr = '<option value="0">Нет</option>';
                response.data.forEach(function (item) {
                    optionStr = optionStr + '<option value="' + item.id + '">' + item.title + '</option>';
                });
                $('#unit-list').html(optionStr);
                $('.chips-btn').each(function (i, f) {
                    if (i >= count) {
                        $(f).remove();
                    }
                })
            }
        }

        axiosPostRequest(url, params, clickChipsResponse);

    });

    /* City page events */

    $('.createCity').click(function () {
        title = $('#inputName').val();
        vtitle = $('#inputVName').val();
        region = $('#region-id').val();
        domain = $('#inputDomain').val();
        yandex = $('#inputYandex').val();
        google = $('#inputGoogle').val();
        webmaster = $('#inputWebMaster').val();
        url = '/api/city/add';
        params = {
            title: title,
            vtitle: vtitle,
            parent_id: region,
            domain: domain,
            yandex_code: yandex,
            google_code: google,
            webmaster: webmaster
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('.editCity').click(function () {
        id = $('#cityid').val();
        title = $('#inputName').val();
        vtitle = $('#inputVName').val();
        region = $('#region-id').val();
        domain = $('#inputDomain').val();
        yandex = $('#inputYandex').val();
        google = $('#inputGoogle').val();
        webmaster = $('#inputWebMaster').val();
        url = '/api/city/edit/' + id;
        params = {
            title: title,
            vtitle: vtitle,
            parent_id: region,
            domain: domain,
            yandex_code: yandex,
            google_code: google,
            webmaster: webmaster
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('body').on('click', '.remove-city-btn', function () {
        const id = $(this).data('id');
        url = '/api/city/remove';
        params = {id: id};
        $(this).closest('tr').remove();
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $("#city-list").change(function () {
        id = $(this).val();
        url = '/api/city/getChild';
        params = {id: id};

        function changeListResponse(response) {
            $('#city_array').append('<button class="btn btn-info btn-sm mr-2 chips-btn" data-id="' + $('#city-list option:selected').val() + '">' + $('#city-list option:selected').text() + '</button>');
            $('#city-id').val(id);
            if (response.data && response.data.length > 0) {
                $('#city-list').children().remove();
                optionStr = '<option value="0">Нет</option>';
                response.data.forEach(function (item) {
                    optionStr = optionStr + '<option value="' + item.id + '">' + item.title + '</option>';
                });
                $('#city-list').html(optionStr);
            } else {
                $('#city-list').children().remove();
                $('#city-list').html('<option value="0">Нет</option>');
                console.log($('#city-list'));
                $('#city-list').attr('disabled', true);
            }
        }

        axiosPostRequest(url, params, changeListResponse);

    });

    $('body').on('click', '#city_array .chips-btn', function () {
        let block = $(this), count = 0;
        $('#city-list').attr('disabled', false);
        $('.chips-btn').each(function (i, f) {
            if ($(f).data('id') == block.data('id')) {
                count = i;
            }
        });
        let id = 0;
        if ($('.chips-btn:nth-child(' + (count) + ')').length) {
            id = $('.chips-btn:nth-child(' + (count) + ')').data('id');
        }
        console.log(id)
        url = '/api/city/getChild';
        params = {id: id};

        function clickChipsResponse(response) {
            $('#city-list').val(id);
            if (response.data && response.data.length > 0) {
                $('#city-list').children().remove();
                optionStr = '<option value="0">Нет</option>';
                response.data.forEach(function (item) {
                    optionStr = optionStr + '<option value="' + item.id + '">' + item.title + '</option>';
                });
                $('#city-list').html(optionStr);
                $('.chips-btn').each(function (i, f) {
                    if (i >= count) {
                        $(f).remove();
                    }
                })
            }
        }

        axiosPostRequest(url, params, clickChipsResponse);

    });

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

    $('.createCompany').click(function () {
        title = $('#inputTitle').val();
        domain = $('#inputDomain').val();
        phone = $('#inputPhone').val();
        email = $('#inputEmail').val();
        address = $('#inputAdress').val();
        workTime = $('#inputWorkTime').val();
        citiId = $('#city-id').val();
        url = '/api/company/add';
        params = {
            title: title,
            domain: domain,
            city_id: citiId,
            address: address,
            phone: phone,
            work_time: workTime,
            email: email
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('.editCompany').click(function () {
        id = $('#companyid').val();
        title = $('#inputTitle').val();
        domain = $('#inputDomain').val();
        phone = $('#inputPhone').val();
        email = $('#inputEmail').val();
        address = $('#inputAdress').val();
        workTime = $('#inputWorkTime').val();
        citiId = $('#city-id').val();
        url = '/api/company/edit/' + id;
        params = {
            title: title,
            domain: domain,
            city_id: citiId,
            address: address,
            phone: phone,
            work_time: workTime,
            email: email
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('body').on('click', '.remove-company-btn', function () {
        const id = $(this).data('id');
        url = '/api/company/remove';
        params = {id: id};
        $(this).closest('tr').remove();
        axiosPostRequest(url, params, modalSweetAlert);
    });

    /* Page events */

    $('.createPage').click(function () {
        title = $('#inputTitle').val();
        description = $('.note-editable').html();
        metaTitle = $('#inputMetaTitle').val();
        metaDesc = $('#inputMetaDescription').val();
        metaKeywords = $('#inputMetaKeywords').val();
        url = '/api/page/add';
        params = {
            title: title,
            description: description,
            meta_title: metaTitle,
            meta_description: metaDesc,
            meta_keywords: metaKeywords
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('.editPage').click(function () {
        console.log('ok');
        id = $('#pageid').val();
        title = $('#inputTitle').val();
        description = $('.note-editable').html();
        metaTitle = $('#inputMetaTitle').val();
        metaDesc = $('#inputMetaDescription').val();
        metaKeywords = $('#inputMetaKeywords').val();
        url = '/api/page/edit/' + id;
        params = {
            title: title,
            description: description,
            meta_title: metaTitle,
            meta_description: metaDesc,
            meta_keywords: metaKeywords
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('body').on('click', '.remove-page-btn', function () {
        const id = $(this).data('id');
        url = '/api/page/remove';
        params = {id: id};
        $(this).closest('tr').remove();
        axiosPostRequest(url, params, modalSweetAlert);
    });

    /* Tariff events */

    $('.createTariff').click(function () {
        title = $('#inputTitle').val();
        raiting = $('#inputRaiting').val();
        price = $('#inputPrice').val();
        limit = $('#inputProdLimit').val();
        ads = $('#inputAds').val();
        promo = $('#inputProdPromotion').val();
        url = '/api/tariff/add';
        params = {
            title: title,
            raiting: raiting,
            price: price,
            prod_limit: limit,
            is_ads: ads,
            prod_promotion: promo
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('.editTariff').click(function () {
        console.log('ok');
        id = $('#tariffid').val();
        title = $('#inputTitle').val();
        raiting = $('#inputRaiting').val();
        price = $('#inputPrice').val();
        limit = $('#inputProdLimit').val();
        ads = $('#inputAds').val();
        promo = $('#inputProdPromotion').val();
        url = '/api/tariff/edit/' + id;
        params = {
            title: title,
            raiting: raiting,
            price: price,
            prod_limit: limit,
            is_ads: ads,
            prod_promotion: promo
        }
        axiosPostRequest(url, params, modalSweetAlert);
    });

    $('body').on('click', '.remove-tariff-btn', function () {
        const id = $(this).data('id');
        url = '/api/tariff/remove';
        params = {id: id};
        $(this).closest('tr').remove();
        axiosPostRequest(url, params, modalSweetAlert);
    });

    /* Category page events */

    $('.createCategory').click(function () {
        title = $('#inputName').val();
        description = $('#inputDescription').val();
        photo = $('#inputPhoto').val();
        metaName = $('#inputMetaTitle').val();
        metaDescription = $('#inputMetaDescription').val();
        metaKeywords = $('#inputMetaKeywords').val();
        parentId = $('#category-id').val();

        url = '/api/category/add';
        params = {
            title: title,
            description: description,
            photo: photo,
            meta_name: metaName,
            meta_description: metaDescription,
            meta_keywords: metaKeywords,
            parent_id: parentId
        }
        axiosPostRequest(url, params, modalSweetAlert)

    });

    $('.editCategory').click(function () {
        id = $('#categoryid').val();
        title = $('#inputName').val();
        description = $('#inputDescription').val();
        photo = $('#inputPhoto').val();
        metaName = $('#inputMetaTitle').val();
        metaDescription = $('#inputMetaDescription').val();
        metaKeywords = $('#inputMetaKeywords').val();
        parentId = $('#category-id').val();

        url = '/api/category/edit/' + id;
        params = {
            title: title,
            description: description,
            photo: photo,
            meta_name: metaName,
            meta_description: metaDescription,
            meta_keywords: metaKeywords,
            parent_id: parentId
        }
        axiosPostRequest(url, params, modalSweetAlert);
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
        axiosPostRequest(url, params, editAdminItemList);
    });

    deleteItemFromList('.remove-product-btn', '/api/product/remove');

    parentChecker("#rubric-list", "#rubric_array", "#rubric-id", "/api/rubric/getChild");



});
