$(document).ready(function () {

    /* Common functions */
    function axiosPostRequest(api, params, responseFunc) {
        axios.post(api, params).then((response) => {
            responseFunc(response);
        });
    }

    async function getAxiosPostRequest(api, params) {
        return await axios.post(api, params);
    }

    bsCustomFileInput.init();

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

    /*  news page */
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

    /* review page */

    $('.editReview').click(function () {
        const params = getAnyPageParameters('#reviewForm');
        const url = '/api/review/edit/' + params.get('reviewid');
        axiosPostRequest(url, params, modalSweetAlert);
    });

    deleteItemFromList('.remove-review-btn', '/api/review/remove');

    /* gallery page */

    $('.gallery #storeImage').click(async function () {
        const params = getAnyPageParameters('#imageInput');
        if(params.get('file') && params.get('file').size != 0) {
            const url = '/api/gallery/getHash';
            const crypt = await getAxiosPostRequest(url, params);

            const urlImage = await saveImage(crypt);
            const msg = await addImageInGallery(urlImage)
            modalSweetAlert(msg);
        }
    });

    async function saveImage(response) {
        if (response.data['status'] == 'success') {
            const url = IMG_PORTAL + 'api/gallery/add';
            const crypt = response.data['crypt'];
            const params = getAnyPageParameters('#imageInput');
            params.append('crypt', crypt);
            return await getAxiosPostRequest(url, params);
        }
    }

    async function addImageInGallery(response) {
        if (response.data['status'] == 'success') {
            const url = '/api/gallery/add';
            const path = response.data['path'];
            const params = {
                photo: path,
                description: '',
                status: 1
            };
            return await getAxiosPostRequest(url, params);
        }
    }

    /* edit forms images */

    $('.edit-form #storeImage').click(async () => {
        const params = getAnyPageParameters('#imageInput');
        if(params.get('file') && params.get('file').size != 0) {
            const url = '/api/gallery/getHash';
            const crypt = await getAxiosPostRequest(url, params);
            const urlImage = await saveImage(crypt);
            const msg = await addImageInGallery(urlImage);
            modalSweetAlert(msg);
            renderAddedImageOnEditForm(urlImage);
        }
    });

    $('body').on('click', '.img-wrapper button', function () {
        const parent = $(this).closest('div');
        const imgPath = $(this).data('path');
        $('input.inputPhoto').each(function() {
            if($(this).data('val') == imgPath) {
                $(this).remove()
            }
        })
        parent.remove();
    });

    $('.gallery-choose-btn').click(function () {
        $('#modal-gallery').modal('show')
        $('.btn-load-image').show();
        const url = '/api/gallery/get/' + 0;
        axiosPostRequest(url, {}, renderPhotosInModal)
    });

    $('.btn-load-image').click(function () {
        const count = $('.gallery-modal .modal-body img').length
        const url = '/api/gallery/get/' + count;
        axiosPostRequest(url, {}, renderPhotosInModal)
    })

    $('body').on('click', '.gallery-modal .modal-body img', function () {
        if($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $(this).addClass('selected');
        }
    })

    $('#modal-gallery').on('hide.bs.modal', function (e) {
        $(this).find('.modal-body .row:first').children().remove()
    })

    $('#selectImage').click(function () {
        $('.gallery-modal .modal-body img.selected').each(function() {
            const item = {};
            item.data = {};
            item['status'] = 'success';
            item.data['path'] = $(this).attr('src')
            renderAddedImageOnEditForm(item)
        })
        $('#modal-gallery').modal('hide')
    })

    function renderAddedImageOnEditForm(response) {
        if (response.data['status'] == 'success' || response['status'] == 'success') {
            let url = response.data['path'];
            let imgurl = url.includes(IMG_PORTAL) ? response.data['path'] : IMG_PORTAL + response.data['path'];
            const input = '<input type="hidden" class="form-control inputPhoto" name="photo[]" data-val="' + response.data['path'] + '" value="' + response.data['path'] + '">'
            const img   = ' <div class="col-sm-3 mt-2">\n' +
                '               <img src="' + imgurl + '" alt="" width="100%"> \n' +
                '               <button type="button" data-path="' + response.data['path'] + '" aria-label="Close" class="close position-absolute "><span aria-hidden="true">×</span></button> \n' +
                '               <input type="hidden" class="form-control inputPhoto" name="photo[]" data-val="' + response.data['path'] + '" value="' + response.data['path'] + '"> \n' +
                '            </div>\n' ;
            $('.img-wrapper').append(img);
        }
    }

    function renderPhotosInModal(response) {
        if (response.status == 200 && response.data) {
            response.data.forEach(function(item) {
                const img   = ' <div class="col-sm-2 mt-2">\n' +
                    '               <img src="' + item.photo + '" alt="" width="100%"> \n' +
                    '            </div>\n' ;
                $('.gallery-modal .modal-body .row:first').append(img);
            });
            if(response.data.length < 24) {
                $('.btn-load-image').hide();
            }
        }
    }

    $( ".sortable-form-img" ).sortable({
        start: function() {
            $(this).find('.ribbon-wrapper').remove();
        },
        stop: function () {
            const ribbon = '<div class="ribbon-wrapper">\n' +
                '                                <div class="ribbon bg-primary">\n' +
                '                                    Основное\n' +
                '                                </div>\n' +
                '                            </div>';
            $(this).children().first().append(ribbon);
        }
    });



});
